<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://posvat.com/img/posvat-logo2.png" rel="icon">
    <title> @yield('title')</title>
    <link href="{{ asset('admin_asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_asset/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/style.css') }}">

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="{{ url('/home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('admin_asset/img/logo/logo2.png') }}">
                   
                </div>
              
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item @yield('page_active')">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>

            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm3"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-hotel"></i>
                    <span>Categories</span>
                </a>
                <div id="collapseForm3" class="collapse" aria-labelledby="headingForm"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item " href="{{route('category.index')}}">Manage Category</a>
                        <a class="collapse-item" href="{{route('subcategory.index')}}">Manage Subcategory</a>

                    </div>
                </div>
            </li>
                   <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm4"
                    aria-expanded="true" aria-controls="collapseForm">
                    <i class="fas fa-hotel"></i>
                    <span>Posts</span>
                </a>
                <div id="collapseForm4" class="collapse" aria-labelledby="headingForm"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item " href="{{route('post.create')}}">Create Post</a>
                        <a class="collapse-item" href="{{route('post.index')}}">View Post</a>

                    </div>
                </div>
            </li>





            <hr class="sidebar-divider">



            <hr class="sidebar-divider">
            {{-- <div class="version" id="version-ruangadmin"></div> --}}
        </ul>
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                 
                
                   
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="{{ asset('admin_asset/img/boy.png') }}"
                                    style="max-width: 60px">
                                <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->name}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                              
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}

                                <div class="dropdown-divider"></div>
                                    <div class="dropdown-item" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a> --}}
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    @yield('admin_content')
                </div>
                <!---Container Fluid-->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <script>
                            document.write(new Date().getFullYear());
                        </script> - developed by
                        <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Posvat</a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('admin_asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('admin_asset/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/demo/chart-area-demo.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('admin_asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // ID From dataTable
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

    @stack('scripts')

</body>

</html>