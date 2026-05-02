<!-- Main Sidebar Container -->
<aside class="main-sidebar my-sidebar-color elevation-4">
  <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>

  <!-- Brand Logo -->
 <a href="index3.html" class="brand-link" style="background-color: #e6f2ff; padding: 10px;">
  <!-- Updated Icon Color -->
  <i class="fas fa-shipping-fast" style="color: #0077cc; font-size: 22px; margin-right: 8px;"></i>
  
  <!-- Updated Text Color -->
  <span class="font-weight-bold" style="color: #005c99; font-size: 18px;">Courier Management</span>
</a>


  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('dist/img/file.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white">Farjana Khan</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
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
              <a href="{{ url('home') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('summary') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Summary</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('about') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>About</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Sender Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Sender Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('create_sender') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Add Sender</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_sender') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Manage Sender</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Parcel Management -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cubes"></i>
            <p>
              Parcel Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <!-- Parcel Registration -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Parcel Registration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('create_registration') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Add Parcel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('manage_registration') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Manage Parcel</p>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Courier Type -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                  Courier Type
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('create_type') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Add Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('manage_type') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Manage Type</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </li>

        <!-- Invoice Management -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Invoice Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('create_invoice') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Create Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_invoice') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Manage Invoice</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Branch Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-code-branch"></i>
            <p>
              Branch Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('branches/create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Add Branch</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('branches') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Manage Branch</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Parcel Status -->
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-info-circle"></i>
            <p>
              Parcel Status
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('status') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Status by Date</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_status') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>View All Status</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Person Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-id-badge"></i>
            <p>
              Person Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('create_person') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Add Person</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_person') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Manage Person</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Vehicle Management -->
          <li class="nav-item menu-open">
          <a href="#" class="nav-link">
             <i class="nav-icon fas fa-truck"></i>
            <p>
              Vehicle Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <!-- Vehicle Registration -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                  Vehicle Registration
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('create_vehicle') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Add Vehicle</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('manage_vehicle') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Manage Vehicle</p>
                  </a>
                </li>
              </ul>
            </li>

            <!--  Vehicle Type -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-truck"></i>
                <p>
                  Vehicle Type
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('create_vehicle_type') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Add Type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('manage_vehicle_type') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i><p>Manage Type</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </li>

        <!-- Shipment Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-ship"></i>
            <p>
              Shipment Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('create_shipment') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Add Shipment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_shipment') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Manage Shipment</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Receiver Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tag"></i>
            <p>
              Receiver Management
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('create_receiver') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Add Receiver</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_receiver') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>Manage Receiver</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Parcel Tracking History -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Parcel Tracking History
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('history/create') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>History by Date</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_history') }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i><p>View All History</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Reports -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ url('manage_type') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Courier Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_vehicle_type') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Vehicle Type</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('manage_status') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i><p>Parcel Status</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Logout -->
        <li class="nav-item">
          <a href="{{ url('logout') }}" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i><p>Logout</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->

  </div>
  <!-- /.sidebar -->
</aside>

<!-- Custom Sidebar Styles -->
<style>
  .main-sidebar {
    background-color: #f8f9fa !important; /* Light gray */
    color: #343a40; /* Dark text */
  }

  .main-sidebar .brand-link {
    background-color: #ffffff !important;
    color: #343a40 !important;
    border-bottom: 1px solid #dee2e6;
  }

  .main-sidebar .brand-link .fa-van-shuttle,
  .main-sidebar .brand-link .brand-text {
    color: #343a40 !important;
  }

  .sidebar .user-panel {
    background-color: #ffffff;
    border-bottom: 1px solid #dee2e6;
  }

  .sidebar .user-panel a {
    color: #343a40 !important;
  }

  .nav-sidebar .nav-link {
    color: #343a40 !important;
  }

  .nav-sidebar .nav-link.active {
    background-color: #e9f1fb !important;
    color: #007bff !important;
  }

  .nav-sidebar .nav-icon {
    color: #6c757d !important;
  }

  .nav-treeview .nav-link {
    padding-left: 30px;
  }

  .sidebar .form-control-sidebar {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    color: #343a40;
  }

  .sidebar .btn-sidebar {
    background-color: #ffffff;
    border: 1px solid #ced4da;
    color: #343a40;
  }

  .sidebar .form-control-sidebar::placeholder {
    color: #6c757d;
  }
</style>


