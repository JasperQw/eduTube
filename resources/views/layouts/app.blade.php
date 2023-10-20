<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'EduTube') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  @include('sweetalert::alert')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  @livewireStyles
</head>
<body class="h-100 overflow-hidden ">
  <div id="app" class="h-100">
    @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="@guest
            container
            @else
            container-fluid
            @endguest">
        @guest
        @else
        <button class="btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#menu" aria-controls="menu">
          <img src="{{ asset('menu.svg') }}" alt="menu">
        </button>
        @endguest

        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'EduTube') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>




        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto ">
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
            <div class="form-floating me-3">
              <select id="connectionType" class="form-select">
                <option selected value="wifi">Wi-Fi</option>
                <option value="wifi-direct">Wi-Fi Direct Sync</option>
                <option value="offline">Offline Mode</option>
              </select>
              <label for="connectionType">Connection Types</label>
            </div>


            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle h-100 d-flex align-items-center " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <p class="m-0 p-0">{{ Auth::user()->name }}</p>
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('self-trade') }}">

                  {{ __('My Trade') }}
                </a>
                <a class="dropdown-item" href="{{ route('self-donation') }}">

                  {{ __('My Donation') }}
                </a>
                <a class="dropdown-item" href="/user-profile/{{Auth::user()->id}}">

                  {{ __('Profile') }}
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>

      </div>
    </nav>
    @endif

    <div class="offcanvas offcanvas-start" tabindex="-1" id="menu" aria-labelledby="menuLabel">
      <div class="offcanvas-header d-flex justify-content-end px-4">

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="list-group ">
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('study-workplace')}}">Study Workplace</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('chilling-workplace')}}">Chilling Workplace</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('mental-health-workplace')}}">Mental Health Workplace</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('trading')}}">Trading</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('donation')}}">Donation</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('financial-aids')}}">Financial Aids</a>
          </li>
          <li class="list-group-item list-group p-0 border-0 py-3">
            <a class="btn w-100 text-start border-0" href="{{route('fundraising')}}">Fundraising</a>
          </li>

        </ul>
      </div>
    </div>
    <main class=" @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register') pb-4 @endif h-100 ">
      @yield('content')
    </main>
  </div>
  @livewireScripts
</body>
</html>
