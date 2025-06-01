@extends('back.layouts-admin.main')

@section('container')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  .password-toggle {
    position: relative;
  }

  .toggle-icon {
    position: absolute;
    top: 50%;
    right: 15px;
    transform: translateY(-50%);
    cursor: pointer;
    color: #6c757d;
  }
</style>


<section class="content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form <small>ubah password</small></h3>
          </div>

          <div class="card-body px-3 px-sm-4">
        <form method="POST" action="/ubahpassword">
            @csrf

            @foreach ($errors->all() as $error)
                <div class="alert alert-danger mb-2" role="alert">
                <small>{{ $error }}</small>
                </div>
            @endforeach

            <div class="form-group mt-3">
                <label for="password">Password Sekarang</label>
                <div class="input-group">
                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                    <i class="fas fa-eye"></i>
                </button>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="new_password">Password Baru</label>
                <div class="input-group">
                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="new-password">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="new_password">
                    <i class="fas fa-eye"></i>
                </button>
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="new_confirm_password">Konfirmasi Password Baru</label>
                <div class="input-group">
                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="new-password">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="new_confirm_password">
                    <i class="fas fa-eye"></i>
                </button>
                </div>
            </div>

            <div class="form-group mt-4 mb-0">
                <button type="submit" class="btn btn-primary w-100 text-uppercase fw-bold">
                Update Password
                </button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Font Awesome (untuk ikon mata) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Script toggle password -->
<script>
  $(document).ready(function () {
    $('.toggle-password').click(function () {
      const target = $(this).data('target');       // misalnya: "password"
      const input = $('#' + target);               // jadi: $('#password')
      const icon = $(this).find('i');

      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
        icon.removeClass('fa-eye').addClass('fa-eye-slash');
      } else {
        input.attr('type', 'password');
        icon.removeClass('fa-eye-slash').addClass('fa-eye');
      }
    });
  });
</script>

@endsection
