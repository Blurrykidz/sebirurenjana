<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} - MPP kota bengkulu</title>
    <link rel="icon" href="{{ asset('asset-front/assets/images/logo/mppkotabkl.png') }}" type="image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('asset-back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    {{-- PUSH CSS SPESIFIC PAGE --}}
    @stack('css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset-back/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page"
    style="background-image: url('{{ url('asset-back/background2.png') }}');background-size: 100%;background-size: cover;background-repeat:no-repeat; background-position:center; fixed">

    @yield('container')

    <!-- jQuery -->
    <script src="{{ asset('asset-back/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('asset-back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- PUSH SCRIPT SPESIFIC PAGE --}}
    @stack('script')

    @include('sweetalert::alert')

    <!-- AdminLTE App -->
    <script src="{{ asset('asset-back/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
