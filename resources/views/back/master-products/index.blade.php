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

        <div class="d-flex justify-content-between align-items-center my-3">
          <!-- Left: Buttons -->
          <div>
              <a href="javascript:void(0)" id="create-new-post" class="btn btn-primary">
                  <i class="fas fa-plus"></i> &nbsp;Tambah Data
              </a>
              <a href="/master-barang" class="btn btn-warning">
                  <i class="fas fa-sync" aria-hidden="true"></i> Refresh Page
              </a>
          </div>

        <!-- Right: Search Form -->
    <div class="ms-auto" style="width: 300px;">
      <form action="/master-barang/" method="GET">
          <div class="input-group">
              <input type="text" class="form-control" name="s" id="s"
                  placeholder="Search by Nama Barang / Kode Barang / Kategori">
              <button type="submit" class="btn btn-secondary">
                  <i class="fas fa-search"></i>
              </button>
          </div>
      </form>
  </div>
      </div>


        @else
        @endif
        <div class="col-12">
          <div class="card">

                <div class="card-body table-responsive p-0">


                    <hr>
                  <table class="table table-hover text-nowrap">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kode Barang</th>
                    <th>Kategori Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Harga Spesial</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $barang)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->name }}</td>
                    <td>{{ $barang->kode }}</td>
                    <td>{{ $barang->category ?? '-' }}</td>
                    <td>{{ $barang->stock.' '.$barang->satuan ?? '' }}</td>
                    <td>{{ rupiah($barang->price) }} </td>
                    <td>{{ rupiah($barang->special_price) ?? '' }} </td>

                    <td>
                      <a href="javascript:void(0)" id="edit-post" data-id="{{ $barang->id }}"  class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i>
                      </a>


                        <form action="/master-product/{{ Crypt::encrypt($barang->id) }}" method="POST" class="d-inline">
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
                <hr>
           <div class="d-flex">
              <div class="mx-auto">
                {!! $products->links('pagination::bootstrap-4') !!}
              </div>
           </div>
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
          <div class="modal-header alert-success">
            <h4 class="modal-title"  id="postCrudModal"></h4>
          </div>
          <div class="modal-body">
            <form action="/master-barang" enctype="multipart/form-data" class="js-validation-signup" id="postForm" name="postForm" method="post">
            @csrf
            <div class="block block-themed block-rounded block-shadow">
              <div class="block-content">

                <div class="form-group row">
                  <div class="col-12">
                    <label for="signup-username">Nama Barang</label>
                    <input type="hidden" id="id" name="id">
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required placeholder="ketik nama_barang">
                    @error('nama_barang')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-12">
                    <label for="signup-username">Kategori Barang</label>
                    <input type="text" class="form-control @error('kategori_barang') is-invalid @enderror" id="kategori_barang" name="kategori_barang" value="{{ old('kategori_barang') }}" required placeholder="ketik kategori_barang">
                    @error('kategori_barang')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>


                <div class="form-group row">


                  <div class="col-6">
                    <label for="signup-username">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="0" placeholder="ketik stok">
                    @error('stok')
                    <div class="invalid-feedback">
                      &nbsp; {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="example-maxlength2">Satuan</label>
                  <select class="form-control @error('satuan_id') is-invalid @enderror" id="satuan_id" name="satuan_id">

                    <option value=""> -- Pilih Satuan -- </option>

                    @foreach ($satuan as $stn)

                    @if(old('satuan_id') == $stn->id)

                    <option value="{{ $stn->id }}" selected> {{ $stn->nama_satuan }}</option>

                    @else

                    <option value="{{ $stn->id }}"> {{ $stn->nama_satuan }}</option>

                    @endif

                    @endforeach

                  </select>

                  @error('satuan_id')

                  <div class="invalid-feedback">

                    {{ $message }}

                  </div>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">

                <div class="col-12">
                  <label for="signup-username">Harga Jual Satuan</label>
                  <input type="number" class="form-control @error('harga_jual_satuan') is-invalid @enderror" id="harga_jual_satuan" name="harga_jual_satuan" value="{{ old('harga_jual_satuan') }}" required placeholder="ketik harga_jual_satuan">
                  @error('harga_jual_satuan')
                  <div class="invalid-feedback">
                    &nbsp; {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <div class="col-12">
                  <label for="signup-username">Barcode</label>
                  <input type="text" id="barcode"  class="form-control" name="barcode">
                </div>
              </div>



              </div>

            </div>
          </div>
          <div class="modal-footer justify-content-between">
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" id="btn-save" class="btn btn-primary">Simpan</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    {{-- Kartu Stok Modal --}}

    <div class="modal fade" id="kartu-stok-modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header alert-success">
            <h4 class="modal-title"  id="title-kartu-stok"></h4>
          </div>
          <div class="modal-body">
            <div class="block block-themed block-rounded block-shadow">
              <div class="block-content">

                {{-- <div class="card-body">
                  <div class="timeline mb-0">
                      @if ($kartu_stok)
                          @foreach ($kartu_stok as $card)
                              <div>
                                  <div class="timeline-item">
                                      <h3 class="timeline-header no-border">
                                        {{ $card  ['pembelian'] }}
                                      </h3>
                                  </div>
                              </div>
                          @endforeach
                      @endif
                  </div>
              </div> --}}

              <p id="dataKartuStok"></p>

          </div>
            </div>
          </div>
        <!-- /.modal-content -->

        <div class="modal-footer justify-content-between">
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" id="btn-save" class="btn btn-primary">Cetak</button>
        </div>

      <!-- /.modal-dialog -->
      </div>
        </div>
      </div>



<script type="application/javascript">
  $('.show_confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
          title: 'Apakah anda yakin ?',
                  text: "Data yang dihapus akan masuk ke file sampah !",
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
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#create-new-post').click(function () {
          $('#btn-save').val("create-post");
          $('#postForm').trigger("reset");
          $('#postCrudModal').html("Input Master Barang");
          $('#ajax-crud-modal').modal('show');
      });

      $('body').on('click', '#edit-post', function () {
        var id = $(this).data('id');
        $.get('master-barang/'+id+'/edit', function (data) {
           $('#postCrudModal').html("Edit Master Barang");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#id').val(data.id);
            $('#nama_barang').val(data.nama_barang);
            $('#kategori_barang').val(data.kategori_barang);
            $('#harga_jual_satuan').val(data.harga_jual_satuan);
            $('#stok').val(data.stok);
            $('#satuan_id').val(data.satuan_id);
            $('#barcode').val(data.barcode);

        })
     });

     $('body').on('click', '#kartu-stok-button', function () {
        var id = $(this).data('id');
        $.get('master-barang/kartu-stok/'+id, function (data) {
          var jsonString = JSON.stringify(data);
           $('#title-kartu-stok').html("Kartu Stok");

           $('#btn-save').val("kartu-stok-button");

            $('#kartu-stok-modal').modal('show');

            document.getElementById('dataKartuStok').innerHTML = JSON.parse(jsonString);
        })
     });

    });

  </script>





    @endsection
