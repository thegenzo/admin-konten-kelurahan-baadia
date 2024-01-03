@extends('admin-panel.layout.app')

@section('title', 'Daftar Anggota Keluarga')

@push('addon-style')
	<!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('panel-assets/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
	<!-- PrismJS -->
	<link rel="stylesheet" href="{{ asset('panel-assets/dist/libs/prismjs/themes/prism-okaidia.min.css') }}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('panel-assets/dist/libs/select2/dist/css/select2.min.css') }}">
@endpush

@php
	$gender = [
		'male' => 'Laki-laki',
		'female' => 'Perempuan'
	]
@endphp

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Daftar Anggota Keluarga</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin-panel.dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin-panel.family-card.index') }}">Data Nomor Kartu Keluarga</a></li>
                                <li class="breadcrumb-item" aria-current="page">Daftar Anggota Keluarga</li>
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
		<section class="datatables">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<div class="cart-title mb-0 text-white">Tambahkan Data Anggota Keluarga</div>
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
							<form action="{{ route('admin-panel.resident.store', ['familyCardId' => $familyCard->id]) }}" method="POST">
								@csrf
								<div class="form-group mb-3">
									<label for="id_number">Nomor Induk Keluarga <span class="text-danger">*</span></label>
									<input type="number" name="id_number" id="id_number" class="form-control" value="{{ old('id_number') }}">
								</div>
								<div class="form-group mb-3">
									<label for="name">Nama <span class="text-danger">*</span></label>
									<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
								</div>
								<div class="form-group mb-3">
									<label for="gender">Jenis Kelamin <span class="text-danger">*</span></label>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
										<label class="form-check-label" for="flexRadioDefault1">
										  Laki-laki
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female">
										<label class="form-check-label" for="flexRadioDefault2">
										  Perempuan
										</label>
									</div>
								</div>
								<div class="form-group mb-3">
									<label for="place_of_birth">Tempat Lahir <span class="text-danger">*</span></label>
									<input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{ old('place_of_birth') }}">
								</div> 
								<div class="form-group mb-3">
									<label for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth')}}">
								</div>
								<div class="form-group mb-3">
									<label for="blood_type">Golongan Darah <span class="text-danger">*</span></label>
									<input type="text" name="blood_type" id="blood_type" class="form-control" value="{{ old('blood_type')}}">
								</div>
								<div class="form-group mb-3">
									<label for="religion">Agama <span class="text-danger">*</span></label>
									<select name="religion" id="religion" class="select2 form-control" style="width: 100%; height: 36px">
										<option value="" selected hidden>--- Pilih Agama ---</option>
										<option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
										<option value="Kristen (Protestan)" {{ old('religion') == 'Kristen (Protestan)' ? 'selected' : '' }}>Kristen (Protestan)</option>
										<option value="Kristen (Katolik)" {{ old('religion') == 'Kristen (Katolik)' ? 'selected' : '' }}>Kristen (Katolik)</option>
										<option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
										<option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Hindu</option>
										<option value="Lainnya" {{ old('religion') == 'Lainnya' ? 'selected' : '' }}>Hindu</option>
									</select>
								</div>
								<div class="form-group mb-3">
									<label for="address">Alamat <span class="text-danger">*</span></label>
									<textarea name="address" id="address" cols="30" rows="10" class="form-control">{{ old('address') }}</textarea>
								</div>
								<div class="form-group mb-3">
									<label for="phone">Nomor Handphone <span class="text-danger">*</span></label>
									<input type="number" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
								</div>
								<div class="form-group mb-3">
									<label for="marital_status">Status Perkawinan <span class="text-danger">*</span></label>
									<input type="text" name="marital_status" id="marital_status" class="form-control" value="{{ old('marital_status') }}">
								</div>
								<div class="form-group mb-3">
									<label for="occupation">Pekerjaan <span class="text-danger">*</span></label>
									<input type="text" name="occupation" id="occupation" class="form-control" value="{{ old('occupation') }}">
								</div>
								<div class="mt-3">
									<button type="submit" class="btn btn-success">Simpan</button>
									<a href="{{ route('admin-panel.family-card.index') }}" class="btn btn-warning">Kembali</a>
									{{-- <a href="{{ route('admin-panel.evidence.show', $evidence->id) }}" class="btn btn-warning">Kembali</a> --}}
								</div>
							</form>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h4 class="text-center">No. KK</h4>
							<h2 class="text-center">{{ $familyCard->number }}</h2>
							<div class="table-responsive">
								<table id="dataTable" class="table border table-bordered display nowrap" style="width: 100%">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">NIK</th>
											<th>Nama</th>
											<th class="text-center">JK</th>
											<th class="text-center">Gol. Darah</th>
											<th>Tempat Lahir</th>
											<th>Tanggal Lahir</th>
											<th>Agama</th>
											<th>Alamat</th>
											<th>No. HP</th>
											<th>Status Perkawinan</th>
											<th>Pekerjaan</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($familyCard->residents as $key => $value)
											<tr>
												<td class="text-center">{{ $loop->iteration }}</td>
												<td class="text-center">{{ $value->id_number }}</td>
												<td>{{ $value->name }}</td>
												<td class="text-center">{{ $gender[$value->gender] }}</td>
												<td class="text-center">{{ $value->blood_type }}</td>
												<td>{{ $value->place_of_birth }}</td>
												<td>{{ $value->date_of_birth }}</td>
												<td>{{ $value->religion }}</td>
												<td>{{ $value->address }}</td>
												<td>{{ $value->phone }}</td>
												<td>{{ $value->marital_status }}</td>
												<td>{{ $value->occupation }}</td>
												<td class="text-center">
													<a href="{{ route('admin-panel.resident.edit', $value->id) }} " class="btn btn-sm btn-warning"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <form action="{{ route('admin-panel.resident.destroy', $value->id) }}" method="POST" class="d-inline swal-confirm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit"
                                                            data-id="{{ $value->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
@endsection

@push('addon-script')
	<script src="{{ asset('panel-assets/dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('panel-assets/dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('panel-assets/dist/libs/select2/dist/js/select2.min.js') }}"></script>
	<script src="{{ asset('panel-assets/dist/libs/prismjs/prism.js') }}"></script>
	<script type="text/javascript">
	$(function () {
		$("#dataTable").DataTable({
			scrollX: true,
		});

		$(".select2").select2();

		$('.swal-confirm').click(function(event) {
			var form = $(this).closest("form");
			var id = $(this).data("id");
			event.preventDefault();
			Swal.fire({
				title: 'Yakin Hapus Anggota Keluarga?',
				text: "Anggota Keluarga yang terhapus tidak dapat dikembalikan",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, hapus!'
			}).then((result) => {
				if (result.isConfirmed) {
					form.submit()
				} else if (result.isDenied) {
					Swal.fire('Perubahan tidak disimpan', '', 'info')
				}
			})
		});
	})
	</script>
@endpush
