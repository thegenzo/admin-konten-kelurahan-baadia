<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('logo-primary.png') }}" class="dark-logo rounded" width="38" />
                <img src="{{ asset('logo-primary.png') }}" class="light-logo rounded" width="38" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-black"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu text-white">Home</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item {{ Route::is('admin-panel.dashboard') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.user.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.user.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">User</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item {{ Route::is('admin-panel.faculties.*') || Route::is('admin-panel.work-unit.*') || Route::is('admin-panel.allotments.*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow {{ Route::is('admin-panel.faculties.*') || Route::is('admin-panel.work-unit.*') || Route::is('admin-panel.allotments.*') ? 'active' : '' }}" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-archive-filled"></i>
                        </span>
                        <span class="hide-menu">Master Data</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item {{ Route::is('admin-panel.faculties.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.faculties.index') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Fakultas</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin-panel.work-units.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.work-units.index') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Unit Kerja</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin-panel.allotments.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.allotments.index') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Penempatan</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="sidebar-item {{ Route::is('admin-panel.endowment') || Route::is('admin-panel.how-to-donate') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow {{ Route::is('admin-panel.endowment') || Route::is('admin-panel.how-to-donate') ? 'active' : '' }}" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-clipboard"></i>
                        </span>
                        <span class="hide-menu">Halaman</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item {{ Route::is('admin-panel.endowment') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.endowment') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Dana Abadi</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin-panel.how-to-donate') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.how-to-donate') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Cara Donasi</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="sidebar-item {{ Route::is('admin-panel.news.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.news.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="hide-menu">Berita</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.announcement.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.announcement.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-speakerphone"></i>
                        </span>
                        <span class="hide-menu">Pengumuman</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.family-card.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.family-card.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-table-share"></i>
                        </span>
                        <span class="hide-menu">Nomor KK</span>
                    </a>
                </li>
                {{-- 
                <li class="sidebar-item {{ Route::is('admin-panel.criminal.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.criminal.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-x"></i>
                        </span>
                        <span class="hide-menu">PTP</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.evidence.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.evidence.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-archive-filled"></i>
                        </span>
                        <span class="hide-menu">Barang Bukti</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.evidence.*') ? 'selected' : '' }}">
                    <a class="sidebar-link has-arrow {{ Route::is('admin-panel.evidence.*') ? 'active' : '' }}" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-archive-filled"></i>
                        </span>
                        <span class="hide-menu">Barang Bukti</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item {{ Route::is('admin-panel.evidence.index') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.evidence.index') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Ditahan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin-panel.evidence.returned') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.evidence.returned') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Dikembalikan</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ Route::is('admin-panel.evidence.terminated') ? 'active' : '' }}">
                            <a href="{{ route('admin-panel.evidence.terminated') }}" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-circle"></i>
                                </div>
                                <span class="hide-menu">Dimusnahkan</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('admin-panel.scan-barcode.*') ? 'selected' : '' }}">
                    <a class="sidebar-link" href="{{ route('admin-panel.scan-barcode.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-scan"></i>
                        </span>
                        <span class="hide-menu">Scan Barcode</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
