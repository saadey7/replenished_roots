<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>{{config('app.name')}} || @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('public/favicon-96x96.png')}}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{asset('public/favicon.svg')}}" />
    <link rel="shortcut icon" href="{{asset('public/favicon.ico')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('public/apple-touch-icon.png')}}" />
    <meta name="apple-mobile-web-app-title" content="MyWebSite" />
    <link rel="manifest" href="{{asset('public/site.webmanifest')}}" />
    <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/plugins/charts-c3/plugin.css')}}" />
    <link rel="stylesheet" href="{{asset('public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />

    <link rel="stylesheet" href="{{asset('public/plugins/morrisjs/morris.min.css')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('public/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/plugins/dropify/css/dropify.min.css')}}">

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{asset('public/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<style>
.list {
    height: calc(100vh - 100px) !important;
}
</style>

<body class="theme-blush">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="" src="{{asset('public/images/loader.gif')}}" width="48" height="48"
                    alt="{{config('app.name')}}"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>


    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="#">
                <!-- <img src="{{asset('public/website/assets/img/logo/logo001.png')}}" width="70"
                    alt="Quicsirv"> -->
                <span>{{config('app.name')}}</span>
            </a>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <a class="image" href="profile.html"><img src="{{asset('public/images/user.png')}}" alt="User"
                                style="border: none; box-shadow: none;"></a>
                        <div class="detail">
                            <h4>{{Auth::guard('admin')->user()->name}}</h4>
                            <small>{{Auth::guard('admin')->user()->email}}</small>
                        </div>
                    </div>
                </li>
                <li class="active open"><a href="./"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li class="{{ (request()->is('admin/allUser')) ? 'active' : '' }}"><a href="{{url('admin/allUser')}}"><i
                            class="zmdi zmdi-account"></i><span>All Users</span></a>
                </li>
                <li class="{{ (request()->is('admin/products')) ? 'active' : '' }}"><a
                        href="{{url('admin/products')}}"><i class="zmdi zmdi-parking"></i><span>All
                            Products</span></a>
                </li>
                <li class="{{ (request()->is('admin/order')) ? 'active' : '' }}"><a href="{{url('admin/order')}}"><i
                            class="zmdi zmdi-shopping-cart"></i><span>All Orders</span></a>
                </li>
                <li>
                    <a class="" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        <i class="zmdi zmdi-lock"></i><span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>
    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{asset('public/bundles/libscripts.bundle.js')}}"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('public/bundles/vendorscripts.bundle.js')}}"></script>
    <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{asset('public/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{asset('public/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
    <script src="{{asset('public/bundles/c3.bundle.js')}}"></script>
    <script src="{{asset('public/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('public/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('public/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/js/pages/tables/jquery-datatable.js')}}"></script>

    <script src="{{asset('public/bundles/mainscripts.bundle.js')}}"></script>
    @if((request()->is('admin/alllegal')) ? 'active' : '' )
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    @endif
    <script src="{{asset('public/js/pages/index.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @yield('page-script')
</body>

</html>