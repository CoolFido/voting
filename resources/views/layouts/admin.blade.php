<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('admin.competitions.index') }}">GalaxyCode</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#gcAdminNavbar" aria-controls="gcAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="gcAdminNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ !Route::is('admin.competitions.*') ?: 'active' }}" href="{{ route('admin.competitions.index') }}">Soutěže</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('auth.logout') }}">Odhlásit se</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="py-3 container">
            @foreach(['success', 'danger'] as $type)
                @if(Session::has($type))
                    <p class="alert bg-{{ $type }} text-light container">
                        {!! Session::get($type) !!}
                    </p>
                @endif
            @endforeach

            @yield('content')
        </div>
    </div>
</body>
</html>
