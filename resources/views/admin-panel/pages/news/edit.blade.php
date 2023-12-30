@extends('admin-panel.layout.app')

@section('title', 'Edit Data Berita')

@push('addon-style')
	<!-- Summernote -->
	<link rel="stylesheet" href="{{ asset('panel-assets/dist/libs/summernote/dist/summernote-lite.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-secondary shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Data Berita</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted"
                                        href="{{ route('admin-panel.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted"
                                        href="{{ route('admin-panel.news.index') }}">Data Berita</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Data Berita</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/breadcrumb/news.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4 class="mb-0 text-white card-title">Masukkan Data Berita Disini</h4>
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <h3 class="text-white">Gagal Simpan Data</h3> 
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('admin-panel.news.update', $news->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset($news->cover_image) }}" class="img-fluid"
                                    style="max-height:300px;" id="cover_preview" alt="Avatar">
                            </div>
                            <div class="form-group mb-3">
                                <label for="cover_image">Foto <span class="text-danger">*</span></label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Judul Berita <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $news->title }}">
                            </div>
                            <div class="form-group mb-3">
								<label for="content">Konten Berita <span class="text-danger">*</span></label>
								<textarea name="content" id="" cols="30" rows="50" class="summernote">{!! $news->content !!}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-select">
                                    <option value="published" {{ $news->status == 'published' ? 'selected' : '' }}>Dipublikasikan</option>
                                    <option value="drafted" {{ $news->status == 'drafted' ? 'selected' : '' }}>Diarsipkan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin-panel.news.index') }}" class="btn btn-warning mx-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
<script src="{{ asset('panel-assets/dist/libs/summernote/dist/summernote-lite.min.js') }}"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#cover_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#cover_image").change(function() {
        readURL(this);
    });
</script>
<script>
    $(".summernote").summernote({
        height: '200px'
    });
</script>
@endpush