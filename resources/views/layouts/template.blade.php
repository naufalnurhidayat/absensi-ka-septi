<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-2.2.4.min.js">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" align="center">  
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('assets/images/logo-mini.svg')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <h3 class="mt-3 mr-4">Aplikasi Absensi Umroh.com</h3>
        <div class="search-field d-none d-md-block">
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="mdi mdi-power"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"> {{ csrf_field() }}
            </form>
          </li>
          <!-- <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li> -->
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @if(!empty(Auth::user()) && strtolower(Auth::user()->nama_pegawai) == 'admin')
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <a href="/home"><img src="{{asset('assets/images/logo.png')}}" alt="logo"/ width="200px" height="150px" style="padding-left: 20%;"></a>
          <li class="nav-item">
            <a class="nav-link">
              <i class="mdi mdi-user menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/absenadmin">
              <span class="menu-title">Data Absen</span>
            </a>
          </li>
          @endif
          @if(!empty(Auth::user()) && strtolower(Auth::user()->nama_pegawai) == 'admin')
          <li class="nav-item">
            <a class="nav-link" href="/pegawai">
              <span class="menu-title">Data Pegawai</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/jabatan">
              <span class="menu-title">Data Jabatan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pendidikan">
              <span class="menu-title">Data pendidikan</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- partial -->
      <?php $user_class = (!empty(Auth::user()) && strtolower(Auth::user()->nama_pegawai) == 'admin') ? '' : 'main_user'; ?>
      <div class="main-panel <?php echo $user_class; ?>">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
              <div class="card-body">
              @yield('content')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('assets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <!-- endinject -->
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );

    $('#inputGroupFile02').on('change',function(){
      var fileName = $(this).val();
      $(this).next('.custom-file-label').html(fileName);
    })
  </script>
  <!-- Custom js for this page-->
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->

  <script>
    
      $('#inputGroupFile02').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
      });
  </script>

</body>

</html>
