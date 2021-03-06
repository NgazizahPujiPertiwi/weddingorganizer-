<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar" style="background-color:#c0392b; color:white;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" style="width:125px"><br>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guard("admin_users")->user())

                            @include('layouts.admin-dropdown')
                              
                        @else                            
    {{-- 
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li> --}}
    
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(Session::has('success'))
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success" role="alert">
                    <strong>Success:</strong> {{ Session::get('success') }}
                </div>
            </div><br>            
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert"> 
                <strong>Errors : </strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>   
            </div><br>
        @endif  

        

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script type="text/javascript">
        @yield('scripts')
    </script>
</body>
</html>
