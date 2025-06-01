@extends('customers.layout.main-login')

@section('container')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <center> <img src="{{ asset('asset-front/assets/images/logo/mppkotabkl.png') }}" class="mt-2 mb-4 ml-2"
                        style="height:130px;width:auto"></center>
                <a href="#" class="h3"><b>Daftar Pemohon - </b>MPP</a><br>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan isi data berikut</p>
                <form action="{{ url('pemohon/daftar') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" placeholder="Nama" class="form-control @error('nama') is-invalid @enderror"
                            id="nama" name="nama" autofocus required value="{{ old('nama') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" required value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Password" type="password"
                            class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                            required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input placeholder="Konfirmasi Password" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <a href="{{ url('pemohon/login') }}" class="btn btn-outline-primary btn-block">LOGIN</a>
                        </div>
                        <div class="col-4"></div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="social-auth-links text-center mt-2 mb-3">
                    <br>
                    <p>atau masuk dengan</p>
                    {{-- <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Masuk dengan Facebook
                    </a> --}}
                    <a href="{{ url('/pemohon/login/google') }}" class="btn btn-block btn-success">
                        <i class="fab fa-google mr-2"></i> Masuk dengan Google
                    </a>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
