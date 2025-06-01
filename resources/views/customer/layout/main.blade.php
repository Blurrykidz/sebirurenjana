<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - MPP</title>
    <link rel="icon" href="{{ asset('asset-front/assets/images/logo/mppkotabkl.png') }}" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/fontawesome-free/css/all.min.css') }}">

    @stack('css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-back/dist/css/adminlte.min.css') }}">

    <style>
        .bg-image {
            background-color: #f8f9fa;
            background-position: 0% 50%;
            background-size: cover;

            .pxy-10 {
                padding-top: 250px !important;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{-- <i class="fas fa-user fa-fw" aria-hidden="true"></i> --}}

                        <div class="image">
                            <img src="{{ auth()->user()->avatar() }}" class="img-circle elevation-1"
                                style="height: 40px;width:auto">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        {{-- <span class="dropdown-item dropdown-header"><strong>{{ auth()->user()->nama }}</strong></span> --}}
                        <h5 class="m-3">{{ auth()->user()->nama }}</h5>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('pemohon/profil-saya') }}" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Profil Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('pemohon/logout') }}" style="color:red" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        @include('pemohon.layout.sidebar')

        @include('sweetalert::alert')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <br>
            <div class="ml-3 mr-3 bg-image" style="background-image: url('{{ asset('asset-back/bg-top.jpg') }}');">
                <div class="bg-black-op">
                    <div class="content content-top text-center">
                        <div class="pxy-3">
                            <h3 style="color:white"><br>{{ $title }} </h3> <br>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- /.content-header -->


            @yield('container')


            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Hak Cipta &copy; dikembangkan oleh <a href="bengkulukota.go.id">Pemerintah Kota
                        Bengkulu</a>.</strong>
                <div class="float-right d-none d-sm-inline-block">
                    <b>Versi</b> 1.0
                </div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('asset-back/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('asset-back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('asset-back/dist/js/adminlte.js') }}"></script>

        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()

                $('#logout').click(function() {
                    if (confirm('Are you sure to logout')) {
                        return true;
                    }

                    return false;
                });
            });
        </script>

        @stack('script')
</body>

</html>
