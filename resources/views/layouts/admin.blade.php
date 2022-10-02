<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Wira Wiri Solo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <!-- Text Editor -->
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display:none;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/rental" class="nav-link">Rental Order</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/wisata" class="nav-link">Wisata</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/riwayat" class="nav-link">Riwayat</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item d-none d-sm-inline-block">
                <form action="/logout" method="POST" >
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-dark rounded " href="#">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
        <img src="{{ asset('dist/img/logoww.png') }}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text">Wira Wiri Solo</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/foto-sampul.jpg') }}" class="img-circle elevation-2" alt="User Image" style="height: 38px; width:38px">
            </div>
            <div class="info">
            <a href="/admin" class="d-block">{{ auth()->user()->nama_user }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/mobil" class="nav-link {{ Request::is('admin/mobil') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-car"></i>
                    <p>Data Mobil</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/user" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/wisata" class="nav-link {{ Request::is('admin/wisata') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-map-marked-alt"></i>
                    <p>Data Wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/laporan" class="nav-link {{ Request::is('admin/laporan') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file" aria-hidden="true"></i>
                        <p>Laporan Transaksi</p>
                    </a>
                    </li>
                {{-- <li class="nav-item">
                    <a href="" class="nav-link {{ Request::is('admin/laporan') ? 'active' : '' }} {{ Request::is('laporan/cetak') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-folder-open"></i>
                    <p>Laporan<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="/admin/laporan" class="nav-link {{ Request::is('admin/laporan') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Laporan Transaksi</p>
                        </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{ route('cetak-transaksi') }}" class="nav-link {{ Request::is('laporan/cetak') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cetak Laporan</p>
                        </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('pengaturan') }}" class="nav-link">
                    <i class="nav-icon fa fa-cog" aria-hidden="true"></i>
                    <p>Pengaturan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-4">
        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            @yield('konten')
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
