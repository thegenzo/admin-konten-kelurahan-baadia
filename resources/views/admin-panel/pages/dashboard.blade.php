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
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg"
                                width="50" height="50" class="mb-1" alt="" />
                            <p class="fw-semibold fs-3 text-primary mb-1"> Total Admin </p>
                            <h5 class="fw-semibold text-primary mb-0">{{ $admins }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-warning shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg"
                                width="50" height="50" class="mb-1" alt="" />
                            <p class="fw-semibold fs-3 text-warning mb-1">Total User</p>
                            <h5 class="fw-semibold text-warning mb-0">{{ $users }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-info shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg"
                                width="50" height="50" class="mb-1" alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Berita </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $news }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card border-0 zoom-in bg-light-success shadow-none">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg"
                                width="50" height="50" class="mb-1" alt="" />
                            <p class="fw-semibold fs-3 text-info mb-1">Pengumuman </p>
                            <h5 class="fw-semibold text-info mb-0">{{ $announcements }}</h5>
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
    </div>
@endsection

@push('addon-script')
    <!--  current page js files -->
    <script src="{{ asset('panel-assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/js/dashboard.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
@endpush
