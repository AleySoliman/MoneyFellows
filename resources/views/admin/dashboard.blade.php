@section('title')
    MoneyFellows - Admin Panel
@endsection

<x-app-layout>

    <x-slot name='styles'>
        <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
<link rel="stylesheet"
    href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }} ">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }} ">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('./plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{ asset('./plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('./plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('./plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href=" {{ asset('./dist/css/adminlte.min.css') }}  ">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('./plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('./plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('./plugins/summernote/summernote-bs4.min.css') }}">
    </x-slot>
        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">

                <!-- Preloader -->

                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                    
                    <!-- Right navbar links -->
                    <!-- Settings Dropdown -->
                        <div class="relative navbar-nav ml-auto"">
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                    @else
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ Auth::user()->name }}
        
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    @endif
                                </x-slot>
        
                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>
        
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif
        
                                    <div class="border-t border-gray-100"></div>
        
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
        
                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>

                </nav>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <aside class="main-sidebar sidebar-dark-primary elevation-4">
                    <!-- Brand Logo -->
                    <a href="{{ URL('/') }}" class="brand-link">
                        <img src="{{ asset('./images/light-logo.png') }}" alt="AdminLTE Logo" class="brand-image"
                            style="opacity: .8">
                        <span class="brand-text font-weight-light"><br></span>
                    </a>

                    <!-- Sidebar -->
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                            <div class="image">
                                <img src="{{ asset('./dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                            </div>
                            <div class="info">
                                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                            </div>
                        </div>

                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Categories
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('categories.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Category</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('categories.index')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Show Categories</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>
                                            Current Gameeyas
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('current.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Gameeya</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('current.index')}}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Show Gameeyas</p>
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

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">@yield('option')</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">@yield('option')</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <div class="px-3">

                        @yield('content')
                    </div>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
            </div>
            <!-- ./wrapper -->

            
        </body>

        </html>

    </div>

    <x-slot name='scripts'>
        <!-- jQuery -->
    <script src=" {{ asset('./plugins/jquery/jquery.min.js') }} "></script>
    <!-- jQuery UI 1.11.4 -->
    <script src=" {{ asset('./plugins/jquery-ui/jquery-ui.min.js') }} "></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)

    </script>
    <!-- Bootstrap 4 -->
    <script src=" {{ asset('./plugins/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <!-- ChartJS -->
    <script src=" {{ asset('./plugins/chart.js/Chart.min.js') }} "></script>
    <!-- Sparkline -->
    <script src=" {{ asset('./plugins/sparklines/sparkline.js') }} "></script>
    <!-- JQVMap -->
    <script src=" {{ asset('./plugins/jqvmap/jquery.vmap.min.js') }} "></script>
    <script src=" {{ asset('./plugins/jqvmap/maps/jquery.vmap.usa.js') }} "></script>
    <!-- jQuery Knob Chart -->
    <script src=" {{ asset('./plugins/jquery-knob/jquery.knob.min.js') }} "></script>
    <!-- daterangepicker -->
    <script src=" {{ asset('./plugins/moment/moment.min.js') }} "></script>
    <script src=" {{ asset('./plugins/daterangepicker/daterangepicker.js') }} "></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src=" {{ asset('./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }} ">
    </script>
    <!-- Summernote -->
    <script src=" {{ asset('./plugins/summernote/summernote-bs4.min.js') }} "></script>
    <!-- overlayScrollbars -->
    <script src=" {{ asset('./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }} "></script>
    <!-- AdminLTE App -->
    <script src=" {{ asset('./dist/js/adminlte.js') }} "></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('./dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src=" {{ asset('./dist/js/pages/dashboard.js') }} "></script>

    <script src="{{asset('./plugins/datatables/jquery.dataTables.min.js')}}"> </script>
<script src="{{asset('./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}} "></script>
<script src="{{asset('./plugins/datatables-responsive/js/dataTables.responsive.min.js')}} "></script>
<script src="{{asset('./plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}} "></script>
<script src="{{asset('./plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}} "></script>
<script src="{{asset('./plugins/datatables-buttons/js/dataTables.buttons.min.js')}} "></script>
<script src="{{asset('./plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('./plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('./plugins/pdfmake/vfs_fonts.js')}}"></script> 
<script src="{{asset('./plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('./plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('./plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    </x-slot>

</x-app-layout>
