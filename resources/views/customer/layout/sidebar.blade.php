<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-navy">
    <a href="{{ url('pemohon') }}" class="brand-link">
        <img src="{{ asset('asset-front/assets/images/logo/mppkotabkl.png') }}" alt="MPP" class="brand-image">
        <span class="brand-text font-weight-light">MPP</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

              

                <li class="nav-header"><b style="color: brown">Antrian Online</b></li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/ambil-antrian*') ? 'active' : '' }}"
                        href="{{ url('pemohon/ambil-antrian') }}">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>Ambil Antrian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/antrian-saya*') ? 'active' : '' }}"
                        href="{{ url('pemohon/antrian-saya') }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Antrian Saya</p>
                    </a>
                </li>
                
                 <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/riwayat-antrian*') ? 'active' : '' }}"
                        href="{{ url('pemohon/riwayat-antrian') }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>Riwayat Antrian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/antrian-berjalan*') ? 'active' : '' }}"
                        href="{{ url('pemohon/antrian-berjalan') }}">
                        <i class="nav-icon fas fa-eye"></i>
                        <p>Lihat Antrian Sekarang</p>
                    </a>
                </li>

                    <li class="nav-header"><b style="color: brown">Helpdesk Panel</b></li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('pemohon/helpdesk-fasyankes*') ? 'active' : '' }}"
                            href="{{ url('pemohon/helpdesk-fasyankes') }}">
                            <i class=" nav-icon fas fa-hands-helping"></i>
                            <p>Helpdesk Fasyankes</p>
                        </a>
                    </li>

                <!--<li class="nav-header"><b style="color: brown">Pelayanan</b></li>-->

                <!--<li class="nav-item">-->
                <!--    <a class="nav-link {{ Request::is('pemohon/riwayat-pelayanan*') ? 'active' : '' }}"-->
                <!--        href="{{ url('pemohon/riwayat-pelayanan') }}">-->
                <!--        <i class="nav-icon fas fa-book"></i>-->
                <!--        <p>Riwayat Pelayanan</p>-->
                <!--    </a>-->
                <!--</li>-->

                <li class="nav-header"><b style="color: brown">Survei Kepuasan</b></li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/riwayat-skm*') ? 'active' : '' }}"
                        href="{{ url('pemohon/riwayat-skm') }}">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Riwayat Pengisian SKM</p>
                    </a>
                </li>

                <li class="nav-header"><b style="color: brown">Dokumen</b></li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pemohon/dokumen*') ? 'active' : '' }}"
                        href="{{ url('pemohon/dokumen') }}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Dokumen Saya</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
