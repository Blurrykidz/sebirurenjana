
@extends('layouts-admin.main')

@section('container')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

@include('sweetalert::alert')
  {{-- <div class="content py-1 text-center">
    <nav class="breadcrumb bg-body-light mb-3">
    </nav>
  </div> --}}

  <section class="content">
      <!-- Default box -->
      <div class="col-12">
        <div class="card">@if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
        @endif

      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="col-sm-2 mb-4 mt-3" >
            <a href="javascript:void(0)" id="create-new-post" type="button" style="float: right" class="btn btn-block bg-gradient-primary" class="btn btn-primary mt-2" >
              <i class="fas fa-plus">  </i> &nbsp;Tambah Data
            </a>
          </div>
          <br><br>
          <div class="row">
            @foreach ($pengguna as $user)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                 {{ cekLevel($user->level) }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $user->name }}</b></h2>
                      <p class="text-muted text-sm"><b>Username: </b> {{ $user->username }} </p>

                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Terdaftar sejak : {{ $user->created_at }}</li>
                        <li class="small"><span class="fa-li"></span> Status : {{ cekAktif($user->aktif) }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      @if($user->foto == NULL)
                        <img src="{{ asset('assets-admin/dist/img/sebirurenjanablue.jpg') }}"  style="width:50%" alt="user-avatar" class="img-circle img-fluid">
                      @else
                        <img src="{{ asset('storage/'.$user->foto) }}" alt="user-avatar" style="width:50%" class="img-circle img-fluid">
                      @endif
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="javascript:void(0)" id="edit-post" data-id="{{ $user->id }}"  class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <form action="/pengguna/{{ Crypt::encrypt($user->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')

                          <button type="submit" class="btn btn-sm btn-danger d-inline show_confirm"  data-toggle="tooltip" title="Hapus Data">
                            <i class="fa fa-trash">  </i>
                          </button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
      <!-- /.card -->

    </section>

    <div class="modal fade bd-example-modal-lg" id="ajax-crud-modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header alert-primary">
            <h4 class="modal-title"  id="postCrudModal"></h4>
          </div>
          <div class="modal-body">
            <form action="/pengguna" enctype="multipart/form-data" class="js-validation-signup" id="postForm" name="postForm" method="post">
            @csrf
            <div class="block block-themed block-rounded block-shadow">
              <div class="block-content">
                <div class="form-group row">
                  <div class="col-6">
                    <label for="signup-username">Nama</label>
                    <input type="hidden" id="id" name="id">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="ketik name">
                    @error('name')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>


                 <div class="col-6">
                    <label for="signup-level">Level</label>
                    <select class="form-control @error('level') is-invalid @enderror" id="level" name="level">
                      <option value=""> -- Pilih Level -- </option>
                      <option value="1"> Admin </option>
                      <option value="2"> Kasir </option>
                    </select>
                    @error('level')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                </div>

                <div class="form-group row">
                  <div class="col-6">
                    <label for="signup-username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autofocus placeholder="ketik username">
                    @error('username')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="signup-username">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}" required autofocus placeholder="ketik password">
                    @error('password')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>

                </div>

                <div class="form-group row">

                    <div class="col-6">

                    <label for="formFileLg" class="form-label">foto pengguna</label>
                    <input class="form-control form-control-lg @error('photo') is-invalid @enderror" name="photo" id="photo" type="file" onchange="previewImage()">
                    <center><img class="img-preview img-fluid mt-3 mb-3 col-sm-5 "></center>
                    @error('photo')

                    <div class="invalid-feedback">

                      {{ $message }}

                    </div>
                    @enderror

                  </div>

                  <div class="col-6">
                    <label for="signup-level">Aktif</label>
                    <select class="form-control @error('aktif') is-invalid @enderror" id="aktif" name="aktif">

                      <option value=""> -- Pilih Status Aktif -- </option>

                      <option value="1" selected> Aktif </option>
                      <option value="0"> Nonaktif </option>


                    </select>

                    @error('aktif')

                    <div class="invalid-feedback">

                      {{ $message }}

                    </div>

                    @enderror
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>


        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>




<script type="application/javascript">

  $('.show_confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
          title: 'Apakah anda yakin ?',
                  text: "Data tidak bisa dikembalikan apabila terhapus !",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Ya, Hapus!'
        })
        .then((willDelete) => {
          if (willDelete.isConfirmed) {
            form.submit();
          }
          else if(willDelete,isDismissed)
          {
            swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
          }
        });
    });

</script>

<script type="application/javascript">

  function previewImage(){

         const file = document.querySelector('#photo');
         const imgPreview = document.querySelector('.img-preview');

         imgPreview.style.display = 'block';

         const oFReader = new FileReader();
         oFReader.readAsDataURL(file.files[0]);

         oFReader.onload = function(oFREvent)
         {
           imgPreview.src = oFREvent.target.result;
         }

       }
</script>



<script>
  $(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#create-new-post').click(function () {
        $('#btn-save').val("create-post");
        $('#postForm').trigger("reset");
        $('#postCrudModal').html("Tambah Pengguna");
        $('#ajax-crud-modal').modal('show');
    });

    $('body').on('click', '#edit-post', function () {
      var id = $(this).data('id');
      $.get('pengguna/'+id+'/edit', function (data) {
         $('#postCrudModal').html("Edit Pengguna");
          $('#btn-save').val("edit-post");
          $('#ajax-crud-modal').modal('show');
          $('#id').val(data.id);
          $('#name').val(data.name);
          $('#username').val(data.username);
          $('#password').val(data.password);
          $('#level').val(data.level);
          $('#aktif').val(data.aktif);

      })
   });
  });

 if ($("#postForm").length > 0) {
      $("#postForm").validate({

     submitHandler: function(form) {
      var actionType = $('#btn-save').val();
      $('#btn-save').html('Sending..');
      let _url     = '/pengguna';

      $.ajax({
          data: $('#postForm').serialize(),
          url: _url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
              var pengguna = '<tr id="id' + data.id + '"><td>' + data.id + '</td><td>' + data.pengguna + '</td><td>' + data.aktif + '</td>';
              pengguna += '<td><a href="javascript:void(0)" id="edit-post" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
              pengguna += '<td><a href="javascript:void(0)" id="delete-post" data-id="' + data.id + '" class="btn btn-danger delete-post">Delete</a></td></tr>';


              if (actionType == "create-post") {
                  $('#table_ajax').prepend(pengguna);
              } else {
                  $("#id" + data.id).replaceWith(pengguna);
              }

              $('#postForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');

          },
          error: function (data) {
              console.log('Error:', data);
              $('#btn-save').html('Save Changes');
          }
      });
    }
  })
}
</script>
<!-- END Fade In Modal -->
    @endsection

