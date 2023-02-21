  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Laundry App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (Route::is('dashboard'))
               <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
               @else
               <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              @endif
              <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    @if (Route::is('master-user'))
                  <li class="nav-item">
                    <a href="{{ route('master-user') }}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master User</p>
                    </a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a href="{{ route('master-user') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master User</p>
                    </a>
                  </li>
                  @endif
                  @if(Route::is('master-produk'))
                  <li class="nav-item">
                    <a href="master-produk" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Produk</p>
                    </a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a href="master-produk" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Produk</p>
                    </a>
                  </li>
                  @endif
                  @if(Route::is('master-outlet'))
                  <li class="nav-item">
                    <a href="master-outlet" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Outlet</p>
                    </a>
                  </li>
                  @else 
                  <li class="nav-item">
                    <a href="master-outlet" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Outlet</p>
                    </a>
                  </li>
                  @endif
                  @if(Route::is('master-pelanggan'))
                  <li class="nav-item">
                    <a href="master-pelanggan" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Pelanggan</p>
                    </a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a href="master-pelanggan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Pelanggan</p>
                    </a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Master Transaksi</p>
                    </a>
                  </li>
                </ul>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
