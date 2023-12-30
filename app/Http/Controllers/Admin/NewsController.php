<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::latest()->get();

        return view('admin-panel.pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-panel.pages.news.create');
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
            'title.required'             => 'Judul berita wajib diisi',
            'cover_image.required'       => 'Sampul berita wajib diisi',
            'cover_image.image'          => 'Sampul berita harus berupa gambar',
            'cover_image.mimes'          => 'Sampul berita harus berformat gambar (jpeg, png atau jpg)',
            'cover_image.max'            => 'Sampul berita maksimal berukuran 2 MB (2048 KB)',
            'content.required'           => 'Konten berita wajib diisi',
            'status.required'            => 'Status berita wajib diisi',
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
            $upload_filepath = 'public/news';
            $path = $image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        News::create($data);

        return redirect()->route('admin-panel.news.index')->with('success', 'Berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin-panel.pages.news.edit', compact('news'));
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
            'title.required'             => 'Judul berita wajib diisi',
            'cover_image.image'          => 'Sampul berita harus berupa gambar',
            'cover_image.mimes'          => 'Sampul berita harus berformat gambar (jpeg, png atau jpg)',
            'cover_image.max'            => 'Sampul berita maksimal berukuran 2 MB (2048 KB)',
            'content.required'           => 'Konten berita wajib diisi',
            'status.required'            => 'Status berita wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $news = News::find($id);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if($request->has('cover_image')) {
            // remove the old cover_image
            $deletePath = public_path($news->cover_image);
            File::delete($deletePath);

            // upload new cover_image
            $image = $request->file('cover_image');
            $filename = time(). '.jpg';
            $upload_filepath = 'public/news';
            $path = $image->storeAs($upload_filepath, $filename);
            unset($data['cover_image']);
            $data['cover_image'] = Storage::url($path);
        }

        $news->update($data);

        return redirect()->route('admin-panel.news.index')->with('success', 'Berita berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $filePath = public_path($news->cover_image);

        // Check if the file exists
        if(file_exists($filePath)) {
            File::delete($filePath);
        }

        $news->delete();

        return back()->with('success', 'Berita berhasil dihapus');
    }
}
