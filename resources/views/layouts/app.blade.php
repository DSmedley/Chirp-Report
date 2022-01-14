<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/creative.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/jquery.circliful.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendor/bootstrap-slider.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span><img title="{{ config('app.name', 'Laravel') }}" style="width:200px; height:50px;" src='/chirpreport.svg' alt="{{ config('app.name', 'Laravel') }}"></span>
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
                        <li class="nav-item {{Request::is('/') ? 'active' : ''}}"><a class="nav-link" href="{{ route('welcome') }}"><span class="fas fa-home"></span> Home</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"><span class="fas fa-chart-pie"></span> Analyze <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ route('analyze') }}"><span class="fas fa-user-circle"></span> Twitter User</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('hashtag') }}"><span class="fas fa-hashtag"></span> Hashtag </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('cashtag') }}"><span class="fas fa-dollar-sign"></span> Cashtag </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{Request::is('compare') ? 'active' : ''}}"><a class="nav-link" href="{{ route('compare') }}"><span class="fas fa-users"></span> Compare</a></li>
                        <li class="nav-item {{Request::is('about') ? 'active' : ''}}"><a class="nav-link" href="{{ route('about') }}"><span class="fas fa-info"></span> About</a></li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img title="{{ Auth::user()->name }}" class="rounded-circle" style="width:20px; height:20px;" src='/uploads/avatars/{{ Auth::user()->avatar }}' alt="{{ Auth::user()->name }}">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
                                    @auth
                                    <li>
                                        <a class="dropdown-item" href="{{ route('user') }}"><span class="fas fa-user"></span> Profile</a>
                                    </li>
                                    @endauth
                                    @auth('admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><span class="fas fa-user"></span> Admin</a>
                                    </li>
                                    @endauth
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="fas fa-sign-out-alt"></span> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

{{--        <main class="py-4">--}}
            @yield('content')
{{--        </main>--}}

	        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="list-inline-item footer-menu-divider">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li class="list-inline-item footer-menu-divider">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="{{ route('admin.login') }}">Admin</a>
                            </li>
                        </ul>
                        <p class="copyright text-muted small">Copyright &copy; {{ config('app.name', 'Laravel') }} {{ \Carbon\Carbon::now()->year }}. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Scripts -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-69914420-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-69914420-2');
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vendor/jquery.circliful.js') }}"></script>
    <script src="{{ asset('js/vendor/Chart.js') }}"></script>
    <script src="{{ asset('js/vendor/sweetalert.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap-slider.js') }}"></script>
    <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5ab19ecbb338830013655046&product=inline-share-buttons' async='async'></script>
    <script src="{{ asset('js/loading.js') }}"></script>
    @yield('javascript')
</body>
</html>
