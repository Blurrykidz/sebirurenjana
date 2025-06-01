<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-0 pb-3 mb-3 mr-1 d-flex">
        {{-- <div class="image">
          <img src="{{ asset('assets-admin/dist/img/Kota_Bengkulu.png')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="image">
         <img src="{{ asset('assets-admin/dist/img/sebirurenjanablue.jpg') }}" class="mt-2 mb-4" style="display: block;margin-left: auto;margin-right: auto;height: 40px;width:auto;border-radius: 10px;">
        </div>
        <div class="info mt-3">
         <h6 style="text-align: center;color: black">{{ ucfirst($nama) }}</h6>
         {{-- <h6 style="text-align: center;color: black">{{ '( '.ucfirst($nip).' )' }}</h6> --}}
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
             <a class="{{ Request::is('dashboard') ? 'nav-link active' : 'nav-link' }}" href="/dashboard">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>

  @if(auth()->user()->level == 1)

          <li class="nav-header" style="font-weight: bold">SUPER ADMIN PANEL</li>

          <li class="nav-item">
            <a class="{{ Request::is('pengguna') ? 'nav-link active' : 'nav-link' }}" href="/pengguna">
              <i class="nav-icon fas fa-user"></i>


              <p>
                Data Pengguna
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="{{ Request::is('distributor') ? 'nav-link active' : 'nav-link' }}" href="/distributor">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                Data Distributor
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="{{ Request::is('satuan') ? 'nav-link active' : 'nav-link' }}" href="/satuan">
              <i class="nav-icon fas fa-paperclip"></i>
              <p>
                Data Satuan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="{{ Request::is('master-product') ? 'nav-link active' : 'nav-link' }}" href="/master-product">
              <i class="nav-icon fas fa-warehouse"></i>
              <p>
                Master Produk
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

       <li class="nav-item">
          <a class="{{ Request::is('kebutuhan-barang') ? 'nav-link active' : 'nav-link' }}" href="/kebutuhan-barang">
            <i class="nav-icon fas fa-notes-medical"></i>
            <p>
              Kebutuhan Barang
            </p>
          </a>
        </li>

         <li class="nav-item">
          <a class="{{ Request::is('passive-stok') ? 'nav-link active' : 'nav-link' }}" href="/passive-stok">
            <i class="nav-icon fas fa-file-medical-alt"></i>
              <p>Pasif Stok
              {{-- <span class="right badge badge-danger">New</span> --}}
            </p>
          </a>
        </li>

          <li class="nav-header" style="color: green; font-weight:bold ">MASTER PANEL</li>

           <li class="nav-item">
            <a class="{{ Request::is('penjualan') ? 'nav-link active' : 'nav-link' }}" href="/penjualan">
              <i class="nav-icon fab fa-sellsy"></i>
              <p>
                Penjualan Hari Ini
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a class="{{ Request::is('barangmasuks/dist') ? 'nav-link active' : 'nav-link' }}" href="/barangmasuks/dist">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Barang Masuk
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>

                <p>
                  Retur
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>

          <ul class="nav nav-treeview">
          <li class="nav-item">
            <a class="{{ Request::is('retur-barang/penjualan') ? 'nav-link active' : 'nav-link' }}" href="/retur-barang/penjualan">
              <i class="far fa-circle nav-icon"></i>

              <p>
                Retur Penjualan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="{{ Request::is('retur-barangs/pembelian') ? 'nav-link active' : 'nav-link' }}" href="/retur-barangs/pembelian">
              <i class="far fa-circle nav-icon"></i>

              <p>
                Retur Barang Masuk
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>
        </li>
          </ul>


          {{-- <li class="nav-item">
            <a class="{{ Request::is('barangmasuk') ? 'nav-link active' : 'nav-link' }}" href="/barangmasuk">
              <i class="nav-icon fas fa-business-time"></i>
              <p>
                Data All Pembelian
              </p>
            </a>
          </li> --}}


      <li class="nav-header" style="color: green; font-weight:bold ">PENCARIAN PANEL</li>

          <li class="nav-item">
            <a class="{{ Request::is('search-barangmasuk') ? 'nav-link active' : 'nav-link' }}" href="/search-barangmasuk">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Cari Barang Masuk
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a class="{{ Request::is('all-penjualan') ? 'nav-link active' : 'nav-link' }}" href="/all-penjualan">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Cari Penjualan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>



          <li class="nav-header" style="color: green; font-weight:bold ">REPORT PANEL</li>

          <li class="nav-item">
            <a class="{{ Request::is('stok-opname') ? 'nav-link active' : 'nav-link' }}" href="/stok-opname">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Stok Opname
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a class="{{ Request::is('kartu-stok') ? 'nav-link active' : 'nav-link' }}" href="/kartu-stok">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Kartu Stok
              </p>
            </a>
          </li>   --}}

          <li class="nav-item">
            <a class="{{ Request::is('barangmasuks/report') ? 'nav-link active' : 'nav-link' }}" href="/barangmasuks/report">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Barang Masuk
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="{{ Request::is('penjualans/report') ? 'nav-link active' : 'nav-link' }}" href="/penjualans/report">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan Penjualan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          @else
          <li class="nav-header" style="color: green; font-weight:bold ">PEGAWAI PANEL</li>

          <li class="nav-item">
            <a class="{{ Request::is('penjualan') ? 'nav-link active' : 'nav-link' }}" href="/penjualan">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Penjualan Hari Ini
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

            <li class="nav-item">
            <a class="{{ Request::is('retur-barang/penjualan') ? 'nav-link active' : 'nav-link' }}" href="/retur-barang/penjualan">
              <i class="far fa-circle nav-icon"></i>

              <p>
                Retur Penjualan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


            <li class="nav-item">
            <a class="{{ Request::is('all-penjualan') ? 'nav-link active' : 'nav-link' }}" href="/all-penjualan">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Cari Penjualan
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>


          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
