<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">SPK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Master Data</div>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'data-balita' ||
                              request()->segment(1) == 'data-alternatif' ||
                              request()->segment(1) == 'data-kriteria' ||
                              request()->segment(1) == 'data-sub-kriteria' ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-list"></i>
            <span>Data</span>
        </a>
        <div id="collapse2" class="collapse {{ request()->segment(1) == 'data-balita' ||
                                               request()->segment(1) == 'data-alternatif' ||
                                               request()->segment(1) == 'data-kriteria' ||
                                               request()->segment(1) == 'data-sub-kriteria' ? 'show' : ''}}" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if (Auth::user()->roles =="admin")
                <a class="collapse-item {{ request()->segment(1) == 'data-lengkap' ? 'active' : ''}}" href="{{ route('data-lengkap') }}">Data Balita</a>
                <a class="collapse-item {{ request()->segment(1) == 'data-kriteria' ? 'active' : ''}}" href="{{ route('data_kriteria') }}">Kriteria</a>
                <a class="collapse-item {{ request()->segment(1) == 'data-balita' ? 'active' : ''}}" href="{{ route('data_balita') }}">Balita</a>
                <a class="collapse-item {{ request()->segment(1) == 'proses-perhitungan' ? 'active' : ''}}" href="{{ route('proses-perhitungan') }}">Proses</a>
                <a class="collapse-item {{ request()->segment(1) == 'data-penilaian' ? 'active' : ''}}" href="{{ route('data-penilaian') }}">Nilai</a>
                @endif
            </div>
        </div>
    </li>
    @if (Auth::user()->roles == "admin")
        <hr class="sidebar-divider m-0">
        <li class="nav-item {{ request()->segment(1) == 'data-pengguna' ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('data_pengguna') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Manajemen Pengguna</span>
            </a>
        </li>        
    @endif
</ul>