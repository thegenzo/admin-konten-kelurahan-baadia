<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email'               => 'required|email',
            'password'            => 'required'
        ];

        $messages = [
            'email.required'      => 'Email wajib diisi',
            'email.email'         => 'Email harus berformat email',
            'password.required'   => 'Password wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill the required data',
                'data' => $validator->errors()
            ], 400);
        }

        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
                'token_type' => 'Bearer'
            ], 201);    
        } else {
            return response()->json([
                'message' => 'Login failed',
            ]); 
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logout success'
        ]);
    }

    public function checkIfIdNumberExist(Request $request)
    {
        $rules = [
            'id_number'               => 'required|exists:residents,id_number',
        ];

        $messages = [
            'id_number.required'      => 'NIK tidak boleh kosong',
            'id_number.exists'        => 'NIK tidak terdaftar',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill the required data',
                'data' => $validator->errors()
            ], 400);
        }

        $resident = Resident::where('id_number', $request->id_number)->first();
        if($resident->user_id) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill the required data',
                'data' => [
                    'id_number' => [
                        'NIK ini telah memiliki akun'
                    ],
                ],
            ], 401);
        }

        return response()->json([
            'message' => 'NIK terdaftar!'
        ], 201);
    }

    public function register(Request $request, $idNumber)
    {
        $rules = [
            'name'      => 'required',
            // 'avatar'    => 'image|mimes:jpeg,png,jpg',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed',
        ];

        $messages = [
            'name.required'         => 'Nama user wajib diisi',
            // 'avatar.image'          => 'Avatar harus berupa gambar',
            // 'avatar.mimes'          => 'Avatar harus berformat gambar (jpeg, png atau jpg)',
            'email.required'        => 'Email user wajib diisi',
            'email.email'           => 'Email user harus berformat email',
            'email.unique'          => 'Email user sudah terpakai',
            'password.required'     => 'Password wajib diisi',
            'password.min'          => 'Password harus berupa 8 karakter',
            'password.confirmed'    => 'Password harus sama dengan konfirmasi password',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please fill the required data',
                'data' => $validator->errors()
            ], 400);
        }

        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['level'] = 'user';
            $data['avatar'] = $request->level == 'admin' ? 'https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png' : 'https://cdn-icons-png.flaticon.com/512/945/945120.png';
    
            $user = User::create($data);
    
            // update resident based on id_number
            $resident = Resident::where('id_number', $idNumber)->update([
                'user_id' => $user->id
            ]);
    
            // generate token
            $token = $user->createToken('auth_token')->plainTextToken;
            
            DB::commit();
    
            return response()->json([
                'user'  => $user,
                'token' => $token,
                'token_type' => 'Bearer'
            ], 201);

        } catch (\Exception $e) { 
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong'
            ]);
        }

    }
}
