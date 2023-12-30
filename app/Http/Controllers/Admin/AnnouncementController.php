<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('admin-panel.pages.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'          => 'required',
            'cover_image'    => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'content'        => 'required',
            'status'         => 'required',
        ];

        $messages = [
            'title.required'             => 'Judul Pengumuman wajib diisi',
            'cover_image.required'       => 'Sampul Pengumuman wajib diisi',
            'cover_image.image'          => 'Sampul Pengumuman harus berupa gambar',
            'cover_image.mimes'          => 'Sampul Pengumuman harus berformat gambar (jpeg, png atau jpg)',
            'cover_image.max'            => 'Sampul Pengumuman maksimal berukuran 2 MB (2048 KB)',
            'content.required'           => 'Konten Pengumuman wajib diisi',
            'status.required'            => 'Status Pengumuman wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if($request->has('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time(). '.jpg';
            $upload_filepath = 'public/announcement';
            $path = $image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        Announcement::create($data);

        return redirect()->route('admin-panel.announcement.index')->with('success', 'Pengumuman berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin-panel.pages.announcement.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title'          => 'required',
            'cover_image'    => 'image|mimes:jpeg,png,jpg|max:2048',
            'content'        => 'required',
            'status'         => 'required',
        ];

        $messages = [
            'title.required'             => 'Judul Pengumuman wajib diisi',
            'cover_image.image'          => 'Sampul Pengumuman harus berupa gambar',
            'cover_image.mimes'          => 'Sampul Pengumuman harus berformat gambar (jpeg, png atau jpg)',
            'cover_image.max'            => 'Sampul Pengumuman maksimal berukuran 2 MB (2048 KB)',
            'content.required'           => 'Konten Pengumuman wajib diisi',
            'status.required'            => 'Status Pengumuman wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $announcement = Announcement::find($id);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if($request->has('cover_image')) {
            // remove the old cover_image
            $deletePath = public_path($announcement->cover_image);
            File::delete($deletePath);

            // upload new cover_image
            $image = $request->file('cover_image');
            $filename = time(). '.jpg';
            $upload_filepath = 'public/announcement';
            $path = $image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        $announcement->update($data);

        return redirect()->route('admin-panel.announcement.index')->with('success', 'Pengumuman berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement)
    {
        $filePath = public_path($announcement->cover_image);

        // Check if the file exists
        if(file_exists($filePath)) {
            File::delete($filePath);
        }

        $announcement->delete();

        return back()->with('success', 'Pengumuman berhasil dihapus');
    }
}
