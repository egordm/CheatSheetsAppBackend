<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Programming cheat sheets - @yield('title')</title>

    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="#">Cheat Sheets</a>

    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>
    <ul class="nav navbar-nav ml-auto" style="margin-right: 16px">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <span class="d-md-down-none">Egor Dmitriev</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                @include('elements.menu')
            </ul>
        </nav>
    </div>

    <!-- Main content -->
    <main class="main">
        <div class="container-fluid">
            @php
                if(isset($_SESSION['alert'])) {
                    echo view('elements.alert', $_SESSION['alert']);
                    unset($_SESSION['alert']);
                }
            @endphp
            @if (isset($alert))
                @include('elements.alert', $alert)
            @endif
            @yield('content')
        </div>
    </main>
</div>

<footer class="app-footer">
    <a>Programming Cheat Sheet</a>
    <span class="float-right">Powered by <a href="http://coreui.io">CoreUI</a></span>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="{{asset('js/tether.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/pace.min.js')}}"></script>
<script src="{{asset('js/Chart.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/views/main.js')}}"></script>

</body>
</html>