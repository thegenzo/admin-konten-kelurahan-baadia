<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getVisiMisi()
    {
        $setting = Setting::find(1);

        return response()->json([
            'success' => true,
            'data' => $setting,
        ]);
    }
}
