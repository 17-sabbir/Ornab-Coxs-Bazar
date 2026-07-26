<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('seo_title', config('app.name', 'Laravel'))</title>
    <meta name="description" content="@yield('seo_description', '')">
    <meta name="keywords" content="@yield('seo_keywords', '')">
    @yield('seo_og')

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Global Branding --}}
    <link rel="stylesheet" href="{{ asset('css/branding.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Favicon, Open Graph and Structured Data (dynamic logo) --}}
    @php $appSettings = $appSettings ?? application(); @endphp
    <link rel="shortcut icon" href="{{ $appSettings && !empty($appSettings->fav_icon) ? asset('images/application/'.$appSettings->fav_icon) : asset('images/application/ornab-logo.png') }}" type="image/x-icon">

    @php
        $logoUrl = $appSettings && !empty($appSettings->main_logo)
            ? secure_url('public/images/application/'.$appSettings->main_logo)
            : secure_url('public/images/application/ornab-logo.png');
    @endphp

    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ $logoUrl }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:image" content="{{ $logoUrl }}">

    @php
        $orgSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'url' => url('/'),
            'logo' => $logoUrl,
            'name' => config('app.name'),
        ];
    @endphp
    <script type="application/ld+json">{!! json_encode($orgSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
