  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('/') }}image/TempahPustaka.png" style="opacity: .8" width="200px">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Selamat Datang, <br>{{ Auth::user()->name }} | {{ Auth::user()->role }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Utama
                  </p>
                </a>
              </li>
               <li class="nav-header">Fungsi Utama</li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Bilik/Ruang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('rooms.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Bilik/Ruang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tempahan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('bookings.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Permohonan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('bookings.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cipta Tempahan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Aduan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('complaints.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Senarai Aduan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('complaints.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cipta Aduan</p>
                </a>
              </li>
            </ul>
          </li>
          </li>


          <li class="nav-header">Bahagian Pengguna</li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Info Pengguna
              </p>
            </a>
          </li>
          <hr>
           <li class="nav-item">
            <a href="{{ url('/logout') }}" class="nav-link">
              <i class="nav-icon  fas fa-sign-out-alt"></i>
              <p>
                Log Keluar
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>