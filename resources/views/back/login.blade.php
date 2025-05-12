@extends('layouts-admin.mainlogin')

@section('container')

@include('sweetalert::alert')

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <center>
            <img src="{{ asset('assets-admin/dist/img/sebirurenjanablue.jpg') }}"
                 class="mt-2 mb-4 ml-2"
                 style="height:140px;width:auto;border-radius: 60px;">
          </center>
          <a href="#" class="h3"><b>Sebiru Renjana</b></a><br>
      <p>Versi 1.0</p>
      {{-- <a href="#" class="h5">Versi 1.0</a> --}}
    </div>
    <div class="card-body">
      @if(session()->has('success'))
          <div class="alert alert-success alert-dismissable" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="alert-heading font-size-h5 font-w700 mb-5">Success</h3>
              <p class="mb-0">
                  {{ session('success') }} <a class="alert-link" href="javascript:void(0)"></a>!
              </p>
          </div>
      @endif

@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 <center>
 <p style="font-size: 13px"> {{ session('error') }} <a class="alert-link" href="javascript:void(0)"></a>!
 </p></center>
</div>
@endif
      <p class="login-box-msg">Silahkan Masuk</p>

      <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" placeholder="Username" class="form-control" id="username" name="username" autofocus required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
            @error('username')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
        </div>

        <div class="input-group mb-3">
          <input placeholder="Password" type="password" class="form-control " id="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


@endsection
