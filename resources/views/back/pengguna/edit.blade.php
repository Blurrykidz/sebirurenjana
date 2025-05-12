@extends('layouts-admin.main')

@section('container')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
 
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <form action="/pegawai/{{ $user->id}}" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="js-maxlength form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>                  
                <input type="hidden" class="js-maxlength form-control @error('id') is-invalid @enderror" id="id" name="id" value="{{ old('id', $user->id) }}" required autofocus>                  
              
                 @error('name')
        
                 <div class="invalid-feedback">
     
                   {{ $message }}
     
                 </div>
                     
                 @enderror
                </div>

                <div class="form-group">
                  <label>NIP</label>
                  <input type="text" class="js-maxlength form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $user->nip) }}" required autofocus>                  
           
                   @error('nip')
          
                   <div class="invalid-feedback">
       
                     {{ $message }}
       
                   </div>
                       
                   @enderror
                  </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="js-maxlength form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required autofocus>                  
         
                 @error('email')
        
                 <div class="invalid-feedback">
     
                   {{ $message }}
     
                 </div>
                     
                 @enderror
                </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control select2bs4 @error('level') is-invalid @enderror" style="width: 100%;" id="level" name="level">                  
                        <option value=""> -- Pilih Hari -- </option>    
                        <option value="1"   {{ $user->level == "1" ? 'selected' : '' }}>ADMIN</option>
                        <option value="2" {{ $user->level == "2" ? 'selected' : '' }}>PEGAWAI</option>
                        <option value="3" {{ $user->level == "3" ? 'selected' : '' }}>KASUBAG TU</option>
                        <option value="4" {{ $user->level == "4" ? 'selected' : '' }}>SEKDIS</option>
                        <option value="5" {{ $user->level == "5" ? 'selected' : '' }}>KEPALA DINAS</option>
                      </select>                 
                  </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Aktif</label>

                <select class="form-control select2bs4 @error('aktif') is-invalid @enderror" style="width: 100%;" id="aktif" name="aktif">                  
                    <option value=""> -- Status Aktif -- </option>    
                    <option value="1" {{ $user->aktif == "1" ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ $user->aktif == "0" ? 'selected' : '' }}>Tidak Aktif</option>
                  </select>                 
              </div>          
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="mb-3"> 
<center>
        <button type="submit" class="btn btn-warning ml-6">Update</button>        
</center>
</div>
    </form>
        <!-- /.card-body -->
        <div class="card-footer">
          <p style="color:green" class="mt-2">  Note : Ubah password di sidebar</p>
        </div>
      </div>
      <!-- /.card -->

     
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<script src="{{ asset('assets-admin/plugins/select2/js/select2.full.min.js') }}"></script>

  <script>
      $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  </script>

  @endsection