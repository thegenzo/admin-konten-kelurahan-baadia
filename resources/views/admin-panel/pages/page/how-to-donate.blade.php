@extends('admin-panel.layout.app')

@section('title', $page->name)

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
                        <h4 class="fw-semibold mb-8">{{ $page->name }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted"
                                        href="{{ route('admin-panel.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $page->name }}</li>
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
                        <h4 class="mb-0 text-white card-title">Update konten halaman {{ $page->name }} disini</h4>
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
                        <form method="POST" action="{{ route('admin-panel.page.update', $page->id) }}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
                            <div class="form-group mb-3">
								<label for="content">Konten Berita <span class="text-danger">*</span></label>
								<textarea name="content" id="" cols="30" rows="50" class="summernote">{!! $page->content !!}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
<script src="{{ asset('panel-assets/dist/libs/summernote/dist/summernote-lite.min.js') }}"></script>
<script>
    $(".summernote").summernote({
        height: '300px'
    });
</script>
@endpush