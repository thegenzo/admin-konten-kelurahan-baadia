<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:34:27 GMT -->

<head>
    <!--  Title -->
    <title>Login &dash; Admin Konten Kelurahan Baadia</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.ico') }}" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{ asset('panel-assets/dist/css/style.min.css') }}" />
    <style>
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #002147; /* Adjust the background color as needed */
            color: #ffffff; /* Adjust the text color as needed */
            padding: 15px;
            text-align: center;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #002147; /* Adjust the background color as needed */
            padding: 15px;
            text-align: center;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <!-- Header -->
            <div class="header">
                <h2 class="text-center text-white">Selamat Datang di Admin Dashboard Konten Baadia</h2>
            </div>
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="{{ asset('logo-primary.png') }}" alt="" width="100px">
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password <span
                                                class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <button type="submit" style="background-color: #fdd428"
                                        class="btn w-100 py-8 mb-4 rounded-2 text-dark">Masuk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <div class="footer text-center py-3">
            <p>&copy; <span id="year"></span> Universitas Dayanu Ikhsanuddin Hak Cipta dilindungi undang-undang.</p>
        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('panel-assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('panel-assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('panel-assets/dist/js/sidebarmenu.js') }}"></script>

    <script src="{{ asset('panel-assets/dist/js/custom.js') }}"></script>
    <script>
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Oct 2023 05:34:27 GMT -->

</html>
