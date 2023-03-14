<!DOCTYPE html>
<html lang="en">
    <head>
        @include('user.layouts.head')
    </head>
    <body>
        <!--//=== pre-loder ===//-->
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="cube1"></div>
                <div class="cube2"></div>
                <h3>De-Don Fitness Center</h3>
            </div>
        </div>
        <!--//=== pre-loder Finesh ===//-->
        <!--//=== Header Section ===//--> 
        <header id="header" class="nav-menu-sec">
            @include('user.layouts.header')
        </header>
        <!--//=== Header Section Finish ===//-->
        @section('main-content')

            @show
            
        @include('user.layouts.footer')
    </body>
</html>