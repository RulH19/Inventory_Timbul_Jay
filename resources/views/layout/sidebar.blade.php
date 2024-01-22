<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-text mx-3">Inventory Timbul Jaya</div>
    </a>
    
    @if(auth()->user()->role == 'kasir' || auth()->user()->role == 'manager')
    <li class="nav-item {{ Route::currentRouteName() == 'laporan' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laporan') }}">
            <i class="fas fa-fw fa-book-open"></i><span> Laporan</span></a>
    </li>
    @endif
    <li class="nav-item {{ Route::currentRouteName() == 'jenisBarang' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jenisBarang') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Jenis Barang</span>
        </a>
    </li>
    <li class="nav-item {{ Route::currentRouteName() == 'barang' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barang') }}">
            <i class="fas fa-home"></i>
            <span>Data Barang</span>
        </a>
    </li>
    
    
    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
    <li class="nav-item {{ Route::currentRouteName() == 'barangMasuk' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barangMasuk') }}">
            <i class="fas fa-shopping-cart"></i><span> Barang Masuk</span></a>
    </li>
    @endif
    <li class="nav-item {{ Route::currentRouteName() == 'barangKeluar' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('barangKeluar') }}">
        <i class="fas fa-truck"></i><span> Barang Keluar</span></a>
    </li>
   
        
    @if (auth()->user()->role == 'manager')
        <li class="nav-item {{ Route::currentRouteName() == 'user' ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user') }}">
                <i class="fas fa-user"></i><span>  User</span></a>
            
        </li>   
    @endif      
            
</ul>
