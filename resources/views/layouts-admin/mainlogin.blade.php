<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Apotek Sepakat</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets-admin/dist/css/adminlte.min.css') }}">
  <link rel="icon" href="{{ asset('assets-admin/dist/img/apotek.png') }}" type="image/x-icon">

</head>

<body class="hold-transition login-page" style="background-image: url('assets-admin/bg-apt.jpg');background-repeat:no-repeat; background-position:center;">
    
    @yield('container')


<!-- jQuery -->
<script src="{{ asset('assets-admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets-admin/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
