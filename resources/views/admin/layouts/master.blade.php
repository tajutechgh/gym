<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/admin-pro/minisidebar/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Jul 2018 12:49:33 GMT -->
<head>
    @include('admin.layouts.head')
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">De-Don Fitness Center</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            @include('admin.layouts.header')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            @include('admin.layouts.sidebar')
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Horizontal navbar and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row hdr-nav-bar">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand hidden-lg-up">Horizontal Menu</a>
                        <a class="navbar-toggler">
                            <span class="ti-menu" data-toggle="collapse" data-target="#navbarText"></span>
                        </a>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <!-- Nav item -->
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
                                </li>
                                <!-- Nav item -->
                            </ul>
                            <div class="call-to-act">
                                <div class="d-flex no-block">
                                    <button type="button" class="btn btn-default fa fa-clock">
                                        {{Carbon\carbon::now()->format('h:i:s')}}
                                    </button>&nbsp;
                                    
                                    <button type="button" class="btn btn-default fa fa-calendar">
                                        {{Carbon\carbon::now()->format('d-m-y')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Horizontal navbar and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">@yield('title')</h3>
                    </div>
                    <div class="col-md-7 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item">Apps</li>
                            <li class="breadcrumb-item active">@yield('sub-title')</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                @section('main-content')

                    @show
                <!-- End Page Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> <strong>Copyright &copy; 2018-{{Carbon\carbon::now()->year}} <a href="#">Tajutech Designs</a>.</strong> All rights reserved. </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @include('admin.layouts.footer')
</body>

</html>