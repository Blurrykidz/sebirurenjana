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



 <!-- Info Boxes -->
<div class="row">

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-mortar-pestle"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Transaksi Hari Ini</span>
        <span class="info-box-number">123 transaksi</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pendapatan Hari Ini</span>
        <span class="info-box-number">Rp. 10.000.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Retur Hari Ini</span>
        <span class="info-box-number">Rp. 500.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-boxes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Jenis Barang</span>
        <span class="info-box-number">200</span>
      </div>
    </div>
  </div>

</div>

<div class="row">

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-mortar-pestle"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Transaksi Hari Ini</span>
        <span class="info-box-number">123 transaksi</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Pendapatan Hari Ini</span>
        <span class="info-box-number">Rp. 10.000.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Retur Hari Ini</span>
        <span class="info-box-number">Rp. 500.000</span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-boxes"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Jenis Barang</span>
        <span class="info-box-number">200</span>
      </div>
    </div>
  </div>

</div>

<!-- Charts -->
<div class="card-body">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center"><strong>Grafik Pendapatan per-Hari (Rp.)</strong></p>
      <div class="chart">
        <canvas id="lineChartHarian"></canvas>
      </div>
    </div>
  </div>
</div>

<div class="card-body">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center"><strong>Grafik Pendapatan & Pengeluaran per-Bulan (Rp.)</strong></p>
      <div class="chart">
        <canvas id="lineChart"></canvas>
      </div>
    </div>
  </div>
</div>


</div>








</section>


@endsection
