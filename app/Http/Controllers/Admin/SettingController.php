<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function runningText()
    {
        $setting = Setting::find(1);

        return view('admin-panel.pages.setting.running-text', compact('setting'));
    }

    public function visiMisi()
    {
        $setting = Setting::find(2);

        return view('admin-panel.pages.setting.visi-misi', compact('setting'));
    }

    public function updateRunningText(Request $request)
    {
        $rules = [
            'content'            => 'required'
        ];

        $messages = [
            'content.required'   => 'Konten wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $setting = Setting::find(1);
        $setting->content = $request->input('content');
        $setting->save();

        return redirect()->back()->with('success', 'Running Text berhasil diupdate');
    }

    public function updateVisiMisi(Request $request)
    {
        $rules = [
            'content'            => 'required'
        ];

        $messages = [
            'content.required'   => 'Konten wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $setting = Setting::find(2);
        $setting->content = $request->input('content');
        $setting->save();

        return redirect()->back()->with('success', 'Visi Misi berhasil diupdate');
    }
}
