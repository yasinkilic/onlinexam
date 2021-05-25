<!DOCTYPE html>
<html lang="tr"><head>

  <meta charset="utf-8" lang="tr">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CRMİKA Panel - @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="{{asset('vendors/font-awesome/css/all.css')}}">
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}">
  
  @stack('css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-users-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Müşteri Yönetimi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.user.index') }}"  data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Kullanıcılar</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
          <i class="fas fa-fw fa-users"></i>
          <span>Müşteriler</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#firmalar" aria-expanded="true" aria-controls="firmalar">
          <i class="fas fa-fw fa-building"></i>
          <span>Firmalar</span>
        </a>
        <div id="firmalar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#departments" aria-expanded="true" aria-controls="departments">
          <i class="fas fa-fw fa-building"></i>
          <span>Departmanlar</span>
        </a>
        <div id="departments" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#collapsePages3" aria-expanded="true" aria-controls="collapsePages3">
          <i class="fas fa-fw fa-ticket-alt"></i>
          <span>Destek Talepleri</span>
        </a>
        <div id="collapsePages3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-blog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Blog</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Kategoriler</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Blog Yazıları</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('admin.index') }}"  data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-tag"></i>
          <span>Etiketler</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        </div>
      </li>
      


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!--<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>-->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           <!-- <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <!--<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>-->
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Auth::guard('panel')->user()->name }}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div><br>
		@yield('content')
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Esagası 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Çıkış Yap</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Çıkış yapmak istediğinizden eminseniz "Çıkış Yap" butonuna basın.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
          <a class="btn btn-primary" href="{{route('admin.logout')}}">Çıkış</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('js/popper.min.js')}}"></script>
  <!-- Page level plugins -->
  <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/datatables.min.js') }}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>
{!! Toastr::message() !!}
  @stack('js')
</body>
</html>
