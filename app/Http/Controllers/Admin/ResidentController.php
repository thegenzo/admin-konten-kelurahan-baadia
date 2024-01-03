<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyCard;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'id_number'         => 'required|unique:residents|numeric',
            'name'              => 'required',
            'gender'            => 'required',
            'blood_type'        => 'required',
            'place_of_birth'    => 'required',
            'date_of_birth'     => 'required|date',
            'religion'          => 'required',
            'address'           => 'required',
            'phone'             => 'required',
            'marital_status'    => 'required',
            'occupation'        => 'required',
        ];

        $messages = [
            'id_number.required'            => 'Nomor Induk Keluarga wajib diisi',
            'id_number.unique'              => 'Nomor Induk Keluarga sudah terdaftar!',
            'id_number.numeric'             => 'Nomor Induk Keluarga harus berupa angka',
            'name.required'                 => 'Nama wajib diisi',
            'gender.required'               => 'Jenis Kelamin wajib diisi',
            'blood_type.required'           => 'Golongan Darah wajib diisi',
            'place_of_birth.required'       => 'Tempat Lahir wajib diisi',
            'date_of_birth.required'        => 'Tanggal Lahir wajib diisi',
            'date_of_birth.date'            => 'Tanggal Lahir harus berformat tanggal',
            'religion.required'             => 'Agama wajib diisi',
            'address.required'              => 'Alamat wajib diisi',
            'phone.required'                => 'Nomor handphone wajib diisi',
            'marital_status.required'       => 'Status Perkawinan wajib diisi',
            'occupation.required'           => 'Pekerjaan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $familyCard = FamilyCard::find($id);
        $familyCard->residents()->create($request->all());

        return redirect()->route('admin-panel.family-card.show', $id)->with('success', 'Anggota Keluarga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {
        return view('admin-panel.pages.resident.edit', compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {
        $rules = [
            'id_number'         => 'required|numeric|unique:residents,id_number,'.$resident->id.'id',
            'name'              => 'required',
            'gender'            => 'required',
            'blood_type'        => 'required',
            'place_of_birth'    => 'required',
            'date_of_birth'     => 'required|date',
            'religion'          => 'required',
            'address'           => 'required',
            'phone'             => 'required',
            'marital_status'    => 'required',
            'occupation'        => 'required',
        ];

        $messages = [
            'id_number.required'            => 'Nomor Induk Keluarga wajib diisi',
            'id_number.unique'              => 'Nomor Induk Keluarga sudah terdaftar!',
            'id_number.numeric'             => 'Nomor Induk Keluarga harus berupa angka',
            'name.required'                 => 'Nama wajib diisi',
            'gender.required'               => 'Jenis Kelamin wajib diisi',
            'blood_type.required'           => 'Golongan Darah wajib diisi',
            'place_of_birth.required'       => 'Tempat Lahir wajib diisi',
            'date_of_birth.required'        => 'Tanggal Lahir wajib diisi',
            'date_of_birth.date'            => 'Tanggal Lahir harus berformat tanggal',
            'religion.required'             => 'Agama wajib diisi',
            'address.required'              => 'Alamat wajib diisi',
            'phone.required'                => 'Nomor handphone wajib diisi',
            'marital_status.required'       => 'Status Perkawinan wajib diisi',
            'occupation.required'           => 'Pekerjaan wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $resident->update($request->all());

        return back()->with('success', 'Anggota Keluarga berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        $resident->delete();

        return back()->with('success', 'Anggota Keluarga berhasil dihapus');
    }
}
