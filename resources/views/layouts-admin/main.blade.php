<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sebiru Renjana</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets-admin/dist/css/adminlte.min.css') }}">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <link rel="icon" href="{{ asset('assets-admin/dist/img/sebirurenjanablue.jpg') }}" type="image/x-icon">

  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  @stack('css')
      <!-- sweet alert  -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />


   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('assets-admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets-admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets-admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
{{-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">

  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <button class="btn btn-success mr-2 mb-3">
            <i class="fas fa-user fa-fw" aria-hidden="true"></i>
            <strong style="color:white;">{{ auth()->user()->name }}</strong>

          </button>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


          <div class="dropdown-divider"></div>
          <a href="/ubahpassword" class="dropdown-item">
            <i class="fas fa-cog mr-2"></i> Ubah Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout" style="color:red" class="dropdown-item">
            <i class="fa fa-sign-out mr-2"></i> Keluar
          </a>

      </li>
      {{-- <li class="nav-item">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/logout" id="logout" class="btn btn-danger mr-3">
            <i class="fas fa-user fa-fw" aria-hidden="true"></i>
            <strong style="color:white;">Logout</strong>

          </a>
        </li>
      </li> --}}

      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->


  @include('layouts-admin.sidebar')
  @include('sweetalert::alert')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <!-- Hero --><br>
  <div class="ml-3 mr-3 bg-image"  style="background-image: url('{{ asset('assets-admin/bg-top.jpg') }}');">
    <div class="bg-black-op">
      <div class="content content-top text-center">
        <div class="pxy-9">
          <h3 style="color:white"><br>{{ $title }} </h3>     <br>
        </div>
      </div>
    </div>
  </div>

  <br>
  <!-- END Hero -->
    <!-- /.content-header -->


    @yield('container')


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy;  <a href="#">blurrykidz</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->
<script>
  $(function(){
    $('#logout').click(function(){
        if(confirm('Are you sure to logout')) {
            return true;
        }

        return false;
    });
});
</script>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
{{-- <script src="{{ asset('assets-admin/plugins/jquery/jquery.min.js') }}"></script> --}}
<!-- Bootstrap -->
<script src="{{ asset('assets-admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets-admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets-admin/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets-admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets-admin/plugins/chart.js/Chart.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('assets-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/select2/js/select2.full.min.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
{{-- <script src="{{ asset('assets-admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets-admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script> --}}

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets-admin/dist/js/demo.js') }}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets-admin/dist/js/pages/dashboard2.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
       $("#example10").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

@stack('script')
</body>
</html>
