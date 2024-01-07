<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventory Timbul Jaya<sup>2</sup></div>
    </a>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('barang') }}">
            <i class="fas fa-home"></i>
            <span>Data Barang</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-user"></i><span>  User</span></a>
        {{-- @if (auth()->user()->role == 'manager')
            
        @endif     --}}
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barangMasuk') }}">
            <i class="fas fa-shopping-cart"></i><span> Barang Masuk</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('barangKeluar') }}">
            <i class="fas fa-truck"></i><span> Barang Keluar</span></a>
            {{-- @if(auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
            
            @endif --}}
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jenisBarang') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Jenis Barang</span>
        </a>
    </li>

    

</ul>
