<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/img/d.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DSS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="{{asset('assets/img/amongus.webp')}}" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="{{url('/')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('criterias')}}" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Criteria
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('alternatives')}}" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Alternative
              </p>
            </a>
          </li>
          <li class="nav-header">Result</li>
          <li class="nav-item">
          <a href="{{url('mabac')}}" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
              <p>
                MABAC
            </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('electre')}}" class="nav-link">
              <i class="nav-icon far fa-chart-bar"></i>
              <p>
                ELECTRE
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a href="{{url('gdss')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                GDSS Result
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
