@extends('admin-panel.layout.app')

@section('title', 'Edit Data Anggota Keluarga')

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-warning shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Edit Data Anggota Keluarga</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted"
                                        href="{{ route('admin-panel.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted"
                                        href="{{ route('admin-panel.family-card.index') }}">Data Anggota Keluarga</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit Data Anggota Keluarga</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/breadcrumb/userGroup.png') }}" alt=""
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
                        <h4 class="mb-0 text-white card-title">Edit Data Anggota Keluarga Disini</h4>
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
                        <form method="POST" action="{{ route('admin-panel.resident.update', $resident->id) }}">
                            @csrf
							@method('PUT')
                            <div class="form-group mb-3">
                                <label for="id_number">Nomor Induk Keluarga <span class="text-danger">*</span></label>
                                <input type="number" name="id_number" id="id_number" class="form-control" value="{{ $resident->id_number }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="name">Nama <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $resident->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male" {{ $resident->gender == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                      Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" {{ $resident->gender == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Perempuan
                                    </label>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="place_of_birth">Tempat Lahir <span class="text-danger">*</span></label>
                                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ $resident->place_of_birth }}">
                            </div> 
                            <div class="form-group mb-3">
                                <label for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $resident->date_of_birth }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="blood_type">Golongan Darah <span class="text-danger">*</span></label>
                                <input type="text" name="blood_type" id="blood_type" class="form-control" value="{{ $resident->blood_type }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="religion">Agama <span class="text-danger">*</span></label>
                                <select name="religion" id="religion" class="select2 form-control" style="width: 100%; height: 36px">
                                    <option value="" selected hidden>--- Pilih Agama ---</option>
                                    <option value="Islam" {{ $resident->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen (Protestan)" {{ $resident->religion == 'Kristen (Protestan)' ? 'selected' : '' }}>Kristen (Protestan)</option>
                                    <option value="Kristen (Katolik)" {{ $resident->religion == 'Kristen (Katolik)' ? 'selected' : '' }}>Kristen (Katolik)</option>
                                    <option value="Hindu" {{ $resident->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ $resident->religion == 'Buddha' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Lainnya" {{ $resident->religion == 'Lainnya' ? 'selected' : '' }}>Hindu</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Alamat <span class="text-danger">*</span></label>
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control">{{ $resident->address }}</textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Nomor Handphone <span class="text-danger">*</span></label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{ $resident->phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="marital_status">Status Perkawinan <span class="text-danger">*</span></label>
                                <input type="text" name="marital_status" id="marital_status" class="form-control" value="{{ $resident->marital_status }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="occupation">Pekerjaan <span class="text-danger">*</span></label>
                                <input type="text" name="occupation" id="occupation" class="form-control" value="{{ $resident->occupation }}">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('admin-panel.family-card.show', $resident->family_card->id) }}" class="btn btn-warning mx-2">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
