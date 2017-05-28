<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="./img/web_icon.png" type="image/png">
    <title>XIMPLETAP</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-fixed-side.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
     <link href="{{ asset('css/sb-admin.css')}}" rel="stylesheet" />
    <!-- Morris Charts CSS -->
     <link href="{{ asset('css/plugins/morris.css')}}" rel="stylesheet" />
    <!-- Custom Fonts -->
     <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" style="background-color:black" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                       <!--  <span style="color=white">MontAlbo MASSAGE HUT</span> -->
                        <img class="logo" src='./img/logo.png' alt='wifimonitoring' id="wifilogo">
                    </a>


                <ul class="nav navbar-right top-nav" style="float:right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user-font" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span> {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                               <!--  <li><a href="{{ route('register') }}">Register</a></li> -->
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>    
                    @endif
            </ul>

            </div>
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @if (Auth::guest())
            
            @else
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                        </li>
                    </ul>
                </div>
            @endif
            <!-- /.navbar-collapse -->
        </nav>
                
         @yield('content')

            <script src="{{ asset('js/jquery.js') }}"></script>
            <script src="{{ asset('js/bootstrap.js') }}"></script>
            <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
            <script src="{{ asset('js/angular.min.js') }}"></script>
            <script src="{{url('js/jquery.dataTables.min.js')}}"></script>\
            <script src="{{url('js/jquery.bootstrap-touchspin.js')}}"></script>

            <!-- Morris Charts JavaScript -->
            <script src="{{ url('js/plugins/morris/raphael.min.js') }}"></script>
            <script src="{{ url('js/plugins/morris/morris-0.4.1.min.js') }}"></script>
      
       @yield('js')
</body>

</html>
