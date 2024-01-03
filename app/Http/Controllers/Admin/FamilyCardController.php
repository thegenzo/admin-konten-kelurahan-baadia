<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FamilyCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FamilyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = FamilyCard::all();

        return view('admin-panel.pages.family-card.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.family-card.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'number'    => 'required|unique:family_cards|numeric'
        ];

        $messages = [
            'number.required'   => 'Nomor Kartu Keluarga wajib diisi',
            'number.unique'     => 'Nomor Kartu Keluarga sudah terdaftar!',
            'number.numeric'    => 'Nomor Kartu Keluarga harus berupa angka'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        FamilyCard::create($request->all());

        return redirect()->route('admin-panel.family-card.index')->with('success', 'Nomor Kartu Keluarga berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyCard $familyCard)
    {
        return view('admin-panel.pages.family-card.show', compact('familyCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyCard $familyCard)
    {
        return view('admin-panel.pages.family-card.edit', compact('familyCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FamilyCard $familyCard)
    {
        $rules = [
            'number'    => 'required|numeric|unique:family_cards,number,'.$familyCard->id.'id'
        ];

        $messages = [
            'number.required'   => 'Nomor Kartu Keluarga wajib diisi',
            'number.unique'     => 'Nomor Kartu Keluarga sudah terdaftar!',
            'number.numeric'    => 'Nomor Kartu Keluarga harus berupa angka'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $familyCard->update($request->all());

        return redirect()->route('admin-panel.family-card.index')->with('success', 'Nomor Kartu Keluarga berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyCard $familyCard)
    {
        if($familyCard->residents()->count() > 0) {
            return redirect()->back()->with('failed', 'Nomor Kartu Keluarga memiliki data relasi dengan anggota keluarga!');
        }

        $familyCard->delete();

        return redirect()->back()->with('success', 'Nomor Kartu Keluarga berhasil dihapus');
    }
}
