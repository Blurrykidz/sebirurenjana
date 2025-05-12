
@extends('layouts-admin.main')

@section('container')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


@include('sweetalert::alert')

<section class="content">

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

    <div class="container-fluid">
      <div class="row">
        @if($level==1)
        <div class="col-sm-2 mb-4 mt-3" >
          <a href="javascript:void(0)" id="create-new-post" type="button" style="float: right" class="btn btn-block bg-gradient-primary" class="btn btn-primary mt-2" >
            <i class="fa fa-plus">  </i> &nbsp;Tambah Data
          </a>
        </div> <br>
        @else
        @endif
        <div class="col-12">
          <div class="card">

               <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Satuan</th>
                    <th>Aktif</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody id="table_ajax">
                    @foreach ($satuans as $satuan)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $satuan->nama_satuan }}</td>
                    <td>{{ cekAktif($satuan->active) }}</td>
                    <td>
                        <a href="javascript:void(0)" id="edit-post" data-id="{{ $satuan->id }}"  class="btn btn-sm btn-warning">
                          <i class="fas fa-edit"></i> </a>

                        <form action="/satuan/{{ Crypt::encrypt($satuan->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger d-inline show_confirm"  data-toggle="tooltip" title="Hapus Data">
                                  <i class="fas fa-trash">  </i>
                                </button>
                        </form>
                  </td>
                  </tr>
            @endforeach
          </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <div class="modal fade" id="ajax-crud-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header alert-primary">
            <h4 class="modal-title"  id="postCrudModal"></h4>
          </div>
          <div class="modal-body">
            <form enctype="multipart/form-data" class="js-validation-signup" id="postForm" name="postForm" method="post">
            @csrf
            <div class="block block-themed block-rounded block-shadow">
              <div class="block-content">
                <div class="form-group row">
                  <div class="col-6">
                    <input type="hidden" id="id" name="id" >
                    <label for="signup-username">Satuan</label>
                    <input type="text" class="form-control @error('nama_satuan') is-invalid @enderror" id="nama_satuan" name="nama_satuan" value="{{ old('nama_satuan') }}" required autofocus placeholder="ketik satuan">
                    @error('nama_satuan')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="signup-level">Aktif</label>
                    <select class="form-control @error('active') is-invalid @enderror" id="active" name="active">
                      <option value=""> -- Pilih Status Aktif -- </option>
                      <option value="1" selected> Aktif </option>
                      <option value="0"> Deactive </option>
                    </select>

                    @error('active')

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
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

<script>
  $(document).ready(function () {
    // Setup CSRF token for all AJAX requests
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // Buka modal untuk tambah data
    $('#create-new-post').click(function () {
      $('#btn-save').val("create-post");
      $('#postForm').trigger("reset");
      $('#postCrudModal').html("Tambah Satuan");
      $('#ajax-crud-modal').modal('show');
    });

    // Buka modal untuk edit data
    $('body').on('click', '#edit-post', function () {
      var id = $(this).data('id');
      $.get('satuan/' + id + '/edit', function (data) {
        $('#postCrudModal').html("Edit Satuan");
        $('#btn-save').val("edit-post");
        $('#ajax-crud-modal').modal('show');
        $('#id').val(data.id);
        $('#nama_satuan').val(data.nama_satuan);
        $('#active').val(data.active);
      });
    });

    // Submit form AJAX
    if ($("#postForm").length > 0) {
      $("#postForm").validate({
        submitHandler: function (form) {
          var actionType = $('#btn-save').val();
          $('#btn-save').html('Sending...');

          $.ajax({
            data: $('#postForm').serialize(),
            url: '/satuan',
            type: "POST",
            dataType: 'json',
            success: function (data) {
              var satuan = '<tr id="id' + data.id + '">' +
                '<td>' + data.id + '</td>' +
                '<td>' + data.nama_satuan + '</td>' +
                '<td>' + data.active + '</td>' +
                '<td><a href="javascript:void(0)" id="edit-post" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>' +
                '<td><a href="javascript:void(0)" id="delete-post" data-id="' + data.id + '" class="btn btn-danger delete-post">Delete</a></td>' +
                '</tr>';

              if (actionType === "create-post") {
                $('#table_ajax').prepend(satuan);
              } else {
                $("#id" + data.id).replaceWith(satuan);
              }

              $('#postForm').trigger("reset");
              $('#ajax-crud-modal').modal('hide');
              $('#btn-save').html('Save Changes');
            },
            error: function (xhr) {
              console.log('Error:', xhr.responseText);
              $('#btn-save').html('Save Changes');
            }
          });
        }
      });
    }

  });
</script>


    @endsection

