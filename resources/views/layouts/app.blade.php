<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PERPUSTAKAAN SMPN 2 DAYEUHKOLOT</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  
    {{--  <link rel="shortcut icon" href="{{ asset('img/ico.png') }}" />  --}}
    <!-- Styles -->
    <link rel="stylesheet" href="/assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"> 

    
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" color="blue">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}"> -->
                   <b><font size="5px">PERPUSTAKAAN SMPN 2 DAYEUHKOLOT |</font></b>
                <!-- </a> -->
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::check())
                            <li class="nav-item {{ Request::is('home') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ url('/') }}"><font color="black" size="4px">   Dashboard</font> |</a>
                            </li>
                          <!--   @role('admin')
                            <li class="nav-item {{ Request::is('admin/authors') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ route('authors.index') }}"><font color="black" size="4px">Penulis</font></a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/books') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ route('books.index') }}"><font color="black" size="4px">Buku</font></a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/members') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ route('members.index') }}"><font color="black" size="4px">Member</font></a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/statistics') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ route('statistics.index') }}"><font color="black" size="4px">Statistik</font></a>
                            </li>  
                            @endrole -->
                            @role('member')
                            <li class="nav-item {{ Request::is('member/guest') ? 'active ' : '' }}">
                                <a class="nav-link" href="{{ route('guest.index') }}"><font color="black" size="4px">Peminjaman Buku</font> |</a>
                            </li>
                             @endrole
                            @if (auth()->check())
                                <li class="nav-item {{ Request::is('settings/profile') ? 'active ' : '' }}">
                                    <a class="nav-link" href="{{ url('/settings/profile') }}"><font color="black" size="4px">Profil</font></a>
                                </li>  
                            @endif
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><font color="black" size="4px">{{ __('Login') }}</font></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"><font color="black" size="4px">Daftar</font></a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <font color="black" size="4px">{{ Auth::user()->name }}</font> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        @include('layouts._flash')
            @yield('content')
        </main>
    </div>
    {{--  JS  --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-select.js')}}"></script>
    <!-- <script src="{{ asset('js/custom1.js')}}"></script> -->
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
        <script src="{{ asset('js/selectize.min.js')}}"></script>
    @yield('scripts')
</body>
</html>
