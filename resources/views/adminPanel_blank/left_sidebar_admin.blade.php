<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Auto Farming Project</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('RegUserform')}}" 
                @if(app('request')->route()->uri=="RegUserform")
                  class="nav-link active"
                @else
                  class="nav-link"
                @endif
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p> User Register</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="{{route('RegPompform')}}" 
                @if(app('request')->route()->uri=="RegPompform")
                  class="nav-link active"
                @else
                  class="nav-link"
                @endif
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pumping station settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('RegIrrigationform')}}" 
                @if(app('request')->route()->uri=="RegIrrigationform")
                  class="nav-link active"
                @else
                  class="nav-link"
                @endif
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Irrigation timing:</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('WaterResorcesform')}}" 
                @if(app('request')->route()->uri=="WaterResorcesform")
                  class="nav-link active"
                @else
                  class="nav-link"
                @endif
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Water Resources:</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Fertilizeform')}}" 
                @if(app('request')->route()->uri=="Fertilizeform")
                  class="nav-link active"
                @else
                  class="nav-link"
                @endif
                >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fertilizers/Nutrients:</p>
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
  <script>
    
  </script>