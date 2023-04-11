<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FAVRIATE</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<link rel="stylesheet" href="/resources/css/app.css">

    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css"
rel="stylesheet"
/>
    <!--Styles -->
  

    <!-- FileUpload FilePond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
   


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #0B0B0B; font-family: Gruppo" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-stone-800 text-white shadow-sm">
            <div class="container">
                <img src="/assets/images/logo.png" alt="" width="40">
                <a class="navbar-brand  " style="color: white; font-weight: 700; margin-left: 5px; font-size: 1.5rem; line-height: 1.75rem;" href="{{ url('/') }}">
                    FAVRIATE
                </a>
                

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                  

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item font-body">
                                    <a class="nav-link text-white" style="font-weight: 700" href="{{ route('login') }}">Logowanie</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white font-bold font-body" style="font-weight: 700" href="{{ route('register') }}">Rejestracja</a>
                                </li>
                            @endif
                        @else
                            <li>
                                
                                @if(Auth::check())
                                <div>
                                    <a class="navbar-brand text-white" style="font-weight: 700" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                @endif
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5 h-screen">
            @yield('content')
        </main>
    </div>
  
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script>
</body>
</html>
