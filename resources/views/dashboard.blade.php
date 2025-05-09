@extends('layouts-admin.main')


<style>

.advanced-btn {
  display: block;
  text-decoration: none;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border-radius: 10px;
  overflow: hidden;
  background: linear-gradient(135deg, #729fcc, #0984e3);
  color: rgb(1, 1, 1);
}

.advanced-btn .info-box {
  display: flex;
  align-items: center;
  padding: 15px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.advanced-btn .info-box-icon {
  background: #3d4040;
  color: #0984e3;
  font-size: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
}

.advanced-btn:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.advanced-btn .info-box:hover {
  background-color: #0984e3;
  color: #363434;
}

.advanced-btn .info-box-icon:hover {
  background: #74b9ff;
  color: #363434;
}

.info-box-content {
  margin-left: 10px;
}


  /* Table styling */
.styled-table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  font-size: 18px;
  font-family: Arial, sans-serif;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  overflow: hidden;
}

/* Header styling */
.styled-table thead tr {
  background-color: #0984e3;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

/* Cell padding */
.styled-table th, .styled-table td {
  padding: 12px 15px;
  text-align: left;
}

/* Alternating row colors */
.styled-table tbody tr:nth-child(odd) {
  background-color: #f3f3f3;
}

/* Hover effect */
.styled-table tbody tr:hover {
  background-color: #d1e7ff;
  cursor: pointer;
}

/* Strong emphasis on text */
.styled-table td strong {
  color: #333;
  font-weight: 600;
}

/* Responsive styling */
@media (max-width: 768px) {
  .styled-table {
    font-size: 16px;
  }

  .styled-table th, .styled-table td {
    padding: 10px 8px;
  }
}



</style>

@section('container')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script><!-- Main content -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
    
    
     


@if($level == 1)

     
  <!-- Info boxes -->
  <div class="row">
          
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-mortar-pestle"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Transaksi Hari ini</span>
          <span class="info-box-number">
            {{ $jumlah_jual }} transaksi
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    
      
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pendapatan Hari Ini</span>
          <span class="info-box-number">{{ rupiah($total_jual) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

     
    <!-- /.col -->    
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Retur Hari Ini </span>
    <span class="info-box-number">{{ rupiah($sum_retur_perhari) }}</span>
  </div>
  <!-- /.info-box-content -->
</div>
  <!-- /.info-box -->
</div>
    
<div class="col-12 col-sm-6 col-md-3">
  <div class="info-box mb-3">
    <span class="info-box-icon bg-warning elevation-1"> <a href="/user"><i class="fas fa-mortar-pestle"></i></a></span>

     <div class="info-box-content">
    <span class="info-box-text">Jumlah Jenis Barang</span>
    <span class="info-box-number">
      {{ $jenis_barangs }}
    </span>
  </div>
    <!-- /.info-box-content -->
  </div>
</div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
     <span class="info-box-icon bg-success elevation-1"><i class="fas fa-mortar-pestle"></i></span>
         <div class="info-box-content">
        <span class="info-box-text">Jumlah Transaksi Bulan Ini</span>
        <span class="info-box-number">
          {{ $jumlah_jual_month }} transaksi
        </span>
      </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pendapatan Bulan Ini </span>
          <span class="info-box-number">{{ rupiah($total_jual_month) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    
    
    
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pengeluaran Bulan Ini </span>
          <span class="info-box-number">{{ rupiah($total_beli) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">

      <div class="info-box mb-3">
       <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-percentage"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Persen Pembelian </span>
          <span class="info-box-number">{{ $persen_pembelian }} %</span>
        </div>
    <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
       
  </div>
  <!-- /.row --> 
  
  <div class="row">
      
      <div class="col-12 col-sm-6 col-md-3">
      <a href="/dashboard-tahun/2023" class="info-box-link advanced-btn">
        <div class="info-box mb-1">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-calendar"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Data Tahun</span>
            <span class="info-box-number">2023</span>
          </div>
        </div>
      </a>
    </div>
    
    <div class="col-12 col-sm-6 col-md-3">
      <a href="/dashboard-tahun/2024" class="info-box-link advanced-btn">
        <div class="info-box mb-1">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-calendar"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Data Tahun</span>
            <span class="info-box-number">2024</span>
          </div>
        </div>
      </a>
    </div>
  
    <div class="col-12 col-sm-6 col-md-3">
      <a href="/dashboard-tahun/2025" class="info-box-link advanced-btn">
        <div class="info-box mb-1">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-calendar"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Data Tahun</span>
            <span class="info-box-number">2025</span>
          </div>
        </div>
      </a>
    </div>
  
    <div class="col-12 col-sm-6 col-md-3">
      <a href="/dashboard-tahun/2026" class="info-box-link advanced-btn">
        <div class="info-box mb-1">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-calendar"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Data Tahun</span>
            <span class="info-box-number">2026</span>
          </div>
        </div>
      </a>
    </div>
  </div>
  
    <div class="card-body">
    <div class="row">
        <div class="info-box">
        <div class="col-md-12">
            <p class="text-center">
                <strong>Grafik Pendapatan per-Hari (Rp.)</strong>
            </p>

            <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="lineChartHarian"></canvas>
              </div>
            <!-- /.chart-responsive -->
        </div>

    </div>
    </div>
    <!-- /.row -->
</div>


      <div class="card-body">
        <div class="row">
            <div class="info-box">
            <div class="col-md-12">
                <p class="text-center">
                    <strong>Grafik Pendapatan & Pengeluaran per-Bulan (Rp.)</strong>
                </p>

                <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="lineChart"></canvas>
                  </div>
                <!-- /.chart-responsive -->
            </div>

        </div>
        </div>
        <!-- /.row -->
    </div>
    

  <div class="row">
    <div class="col-md-6 mt-2 mb-2">
    <div class="card mt-4">
        
        <p class="text-center">
                  <strong>Diagram Total Penjualan By User - Per Hari Ini</strong>
              </p>

              <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="pieChartpenjualan"></canvas>
                </div>
              <!-- /.chart-responsive -->
              
              <br>
                  <p class="ml-3">Keterangan : </p> 
                  <table class="styled-table">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Total Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($total_penjualan_per_user_today as $data)
                        <tr>                                                 
                          <td><strong>{{ $data->name }}</strong></td>
                          <td><strong>{{ rupiah($data->count) }}</strong></td>
                        </tr>
                      @endforeach                    
                    </tbody>
                  </table>
                  
          </div>
    </div>

          <div class="col-md-6 mt-2 mb-2">
  <div class="card mt-4">
              
            <p class="text-center">
                <strong>Diagram Total Penjualan By User - Per Bulan Ini</strong>
            </p>

            <div class="chart">
                  
                <canvas id="pieChartpenjualanByUser"></canvas>
              </div>
              
               <br>
                  <p class="ml-3">Keterangan : </p> 
                  <table class="styled-table">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Total Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($total_penjualan_per_user as $data)
                        <tr>                                                 
                          <td><strong>{{ $data->name }}</strong></td>
                          <td><strong>{{ rupiah($data->count) }}</strong></td>
                        </tr>
                      @endforeach                    
                    </tbody>
                  </table>
             
        </div>
            </div>
      </div>
    
    <div class="card-body">
    <div class="row">
        <div class="col-md-6">
      <div class="card mt-4">
            
        <div class="card-body table-responsive p-1">
          <div class="card-header mb-3">      
          <h5 style="color:red" class="card-title">  <i class="fas fa-warning"></i> Almost Expired </h5>
          </div>
           <table id="example10" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>                    
                <th>Stok</th>                    
                <th>Kadaluarsa</th>                     
                    
              </tr>
              </thead>
              <tbody>
              @foreach ($expired as $exp )
                
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$exp->kode_barang}}</td>
                <td>{{ $exp->nama_barang }}</td>
                <td>{{ $exp->stok.' '.$exp->satuan->nama_satuan }}</td>
                   <td> 
                           {{ \Carbon\Carbon::parse($exp->expired)->translatedFormat('l, d M Y') }}
                 </td>
                          
              </tr>      
              
              @endforeach
              
      </tbody>
             
            </table>                
       
          
          </div>
          <!-- /.card-body -->
        </div>
        </div>

        <div class="col-md-6">
          <div class="card mt-4">
                
            <div class="card-body table-responsive p-1">
              <div class="card-header mb-3">      
                <h5 style="color:red" class="card-title">  <i class="fas fa-warning"></i> Data Jatuh Tempo</h5>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>No</th>
                    <th>Invoice</th>
                    <th>Distributor</th>
                    <th>Jatuh Tempo</th>     
                    <th>Detail</th>                  

                  </tr>
                  </thead>
                  <tbody>
                    
                    @if($due_date!=null)
                    @foreach ($due_date as $due )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $due->no_invoice ?? '-' }}</td>
                <td>{{$due->distributor->name}}</td>
             <td>
                        {{ \Carbon\Carbon::parse($due->due_date)->translatedFormat('l, d M Y') }}
                </td>
                <td>
                  <a href="/barangmasuks/dist/{{ $due->dist_id }}/{{ $due->id }}" class="btn btn-sm btn-info">
                    <i class="fas fa-eye"></i> 
                  </a>   
                </td>
                          
              </tr>      
              
              @endforeach
              @else
              <tr>
                  <td style="text-align: center; vertical-align: middle;"colspan="5">
                        BELUM ADA DATA
                  </td>
              </tr>
              @endif
          </tbody>
                 
                </table>                
          
             
              </div>
          
            
              <!-- /.card-body -->
            </div>
           
            </div>
            
           
      </div>
      </div>
    
  <!--    <div class="card-body">-->
  <!--    <div class="row">-->
  <!--        <div class="info-box">-->
  <!--        <div class="col-md-12">-->
  <!--            <p class="text-center">-->
  <!--                <strong>Profit Chart (Rp.)</strong>-->
  <!--            </p>-->

  <!--            <div class="chart">-->
                  <!-- Sales Chart Canvas -->
  <!--                <canvas id="profitChart"></canvas>-->
  <!--              </div>-->
              <!-- /.chart-responsive -->
  <!--        </div>-->

  <!--    </div>-->
  <!--    </div>-->
      <!-- /.row -->
  <!--</div>-->
    
              

        @else
        
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-mortar-pestle"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Item Terjual Hari ini</span>
                <span class="info-box-number">
                  {{ $jumlah_jual }} items
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
            
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
  
              <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan Hari Ini</span>
                <span class="info-box-number">{{ rupiah($total_jual) }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          
            <div class="col-12 col-sm-6 col-md-4">
      <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Pendapatan Bulan Ini </span>
          <span class="info-box-number">{{ rupiah($total_jual_month) }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
          <!-- /.col -->
          </div>
          
          <div class="row">
    <div class="col-md-6 mt-2 mb-2">
    <div class="card mt-4">
        
        <p class="text-center">
                  <strong>Diagram Total Penjualan By User - Per Hari Ini</strong>
              </p>

              <div class="chart">
                  <!-- Sales Chart Canvas -->
                  <canvas id="pieChartpenjualan"></canvas>
                </div>
              <!-- /.chart-responsive -->
          </div>
    </div>

          <div class="col-md-6 mt-2 mb-2">
  <div class="card mt-4">
              
            <p class="text-center">
                <strong>Diagram Total Penjualan By User - Per Bulan Ini</strong>
            </p>

            <div class="chart">
                  
                <canvas id="pieChartpenjualanByUser"></canvas>
              </div>
              
               <br>
                  <p class="ml-3">Keterangan : </p> 
                  <table class="styled-table">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Total Sales</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($total_penjualan_per_user as $data)
                        <tr>                                                 
                          <td><strong>{{ $data->name }}</strong></td>
                          <td><strong>{{ rupiah($data->count) }}</strong></td>
                        </tr>
                      @endforeach                    
                    </tbody>
                  </table>
             
        </div>
            </div>
      </div>
        
         <div class="row">
        <div class="col-md-6">
      <div class="card mt-4">
            
        <div class="card-body table-responsive p-1">
          <div class="card-header mb-3">      
          <h5 style="color:red" class="card-title">  <i class="fas fa-warning"></i> Almost Expired </h5>
          </div>
           <table id="example10" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>                    
                <th>Stok</th>                    
                <th>Kadaluarsa</th>                     
                    
              </tr>
              </thead>
              <tbody>
              @foreach ($expired as $exp )
                
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$exp->kode_barang}}</td>
                <td>{{ $exp->nama_barang }}</td>
                <td>{{ $exp->stok.' '.$exp->satuan->nama_satuan }}</td>
                   <td> 
                           {{ \Carbon\Carbon::parse($exp->expired)->translatedFormat('l, d M Y') }}
                 </td>
                          
              </tr>      
              
              @endforeach
              
      </tbody>
             
            </table>                
       
          
          </div>
          <!-- /.card-body -->
        </div>
        </div>

        <div class="col-md-6">
          <div class="card mt-4">
                
            <div class="card-body table-responsive p-1">
              <div class="card-header mb-3">      
                <h5 style="color:red" class="card-title">  <i class="fas fa-warning"></i> Data Jatuh Tempo</h5>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>No</th>
                    <th>Invoice</th>
                    <th>Distributor</th>
                    <th>Jatuh Tempo</th>     
                    <th>Detail</th>                  

                  </tr>
                  </thead>
                  <tbody>
                    
                  
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> </td>
                          
              </tr>      
              
             
              {{-- <tr>
                  <td style="text-align: center; vertical-align: middle;"colspan="5">
                        BELUM ADA DATA
                  </td>
              </tr> --}}
             
          </tbody>
                 
                </table>                
          
             
              </div>
          
            
              <!-- /.card-body -->
            </div>
           
            </div>
            
           
      </div>
      
      
        @endif


</section>


@endsection