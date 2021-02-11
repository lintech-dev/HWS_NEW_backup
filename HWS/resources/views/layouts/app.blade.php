<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    HWS
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                        
                        <?php
                            include 'conn.php';
                            $email = Auth::user()->email;
                            //echo"$admin_email";
                            $query1="Select * from users where email='$email'";
                            $stmt1= $conn->query($query1);
                            while($row1 = $stmt1->fetch())
                            {
                                $role=$row1['role'];
                            }
                            
                            if($role == "User")
                            {
                                
                            ?>
                        
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                <a class="nav-link" href="UDashboard">Home</a>
                            </li>
                            
                             <li class="nav-item">
                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                <a class="nav-link" href="Create_User_Request">Customer Request</a>
                            </li>
                           
                            
                            <li class="nav-item">
                                <!-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> -->
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                            <?php 
                            }
                            ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
