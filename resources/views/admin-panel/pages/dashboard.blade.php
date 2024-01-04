@extends('admin-panel.layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <!--  Owl carousel -->
        <div class="owl-carousel counter-carousel owl-theme">
            <div class="item">
                <div class="card border-0 zoom-in bg-light-primary shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/admin.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1"> Total Admin </p>
                            <h5 class="fw-semibold text-primary mb-0">{{ $admins }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-secondary shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/teamwork.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-warning mb-1">Total User</p>
                            <h5 class="fw-semibold text-warning mb-0">{{ $users }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/news.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Berita </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $news }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-danger shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/megaphone.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Pengumuman </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $announcements }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/card.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Total KK </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $familyCards }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('panel-assets/dist/images/iconscout/family.png') }}" class="mb-1"
                                alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Total Penduduk </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $residents }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <h3 class="text-center">Grafik Barang Bukti berdasarkan status</h3>
                <canvas id="myChart"></canvas>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="card w-100 bg-info-subtle overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-7">
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{ auth()->user()->avatar }}" alt="" width="40"
                                            height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5">Selamat Datang {{ auth()->user()->name }}!</h5>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="border-end pe-4 border-muted border-opacity-10">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">{{ $newsPosted }}<i
                                                class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                        <p class="mb-0 text-dark">Berita yang anda posting</p>
                                    </div>
                                    <div class="ps-4">
                                        <h3 class="mb-1 fw-semibold fs-8 d-flex align-content-center">{{ $announcementPosted }}<i
                                                class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h3>
                                        <p class="mb-0 text-dark">Pengumuman yang anda posting</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="{{ asset('panel-assets/dist/images/backgrounds/welcome-bg.svg') }}"
                                        alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <!--  current page js files -->
    <script src="{{ asset('panel-assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/js/dashboard.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
@endpush
