<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- favicon --}}
    @php $appSettings = application(); @endphp
    <link rel="shortcut icon" href="{{ $appSettings && !empty($appSettings->fav_icon) ? asset('images/application/'.$appSettings->fav_icon) : asset('images/application/ornab-logo.png') }}" type="image/x-icon">
        @php
            $logoUrl = $appSettings && !empty($appSettings->main_logo)
                ? asset('images/application/'.$appSettings->main_logo)
                : asset('images/application/ornab-logo.png');
        @endphp

        <meta property="og:title" content="{{ config('app.name') }}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url('/') }}">
        <link rel="canonical" href="{{ url('/') }}">
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
    {{-- bootstrap css --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    {{-- Global Branding --}}
    <link rel="stylesheet" href="{{ asset('css/branding.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modern-design.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Import Vibrant Vision Fonts */
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Playfair+Display:wght@600;700;800;900&display=swap');

        body {
            font-family: 'DM Sans', sans-serif !important;
            background-color: #F8FAFC; /* Canvas */
            color: #131920; /* Ink */
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4, .navbar-brand {
            font-family: 'Playfair Display', serif !important;
        }

        :root {
            --uerd-primary: var(--primary-color);
            --uerd-secondary: var(--secondary-color);
            --uerd-accent: var(--accent-color);
        }
        
        /* Glass Navbar & Header Improvements */
        .navbar {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(255, 255, 255, 0.8); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(19, 25, 32, 0.05); /* Glass Shadow */
        }
        
        /* Modernize Buttons - Pill Style */
        .btn {
            border-radius: 9999px; /* Pill shape */
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.3px;
            padding: 0.6rem 1.5rem; /* Spacious */
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(0,0,0,0.15);
        }
        
        .btn-danger {
            background-color: #E61932; /* Urgency Rose */
            border: none;
            box-shadow: 0 4px 14px 0 rgba(230, 25, 50, 0.39);
        }
        
        .btn-primary {
            background: var(--uerd-primary) !important;
            border: 1px solid var(--uerd-primary) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 14px 0 rgba(21, 131, 104, 0.39); /* Teal Glow */
        }
        .btn-primary:hover {
            filter: brightness(1.1);
            box-shadow: 0 6px 20px rgba(21, 131, 104, 0.23);
        }

        .btn-warning {
            background: var(--uerd-accent) !important;
            border-color: var(--uerd-accent) !important;
            color: #ffffff !important; /* Better contrast */
            box-shadow: 0 4px 14px 0 rgba(249, 116, 21, 0.39); /* Orange Glow */
        }
        .btn-warning:hover {
            filter: brightness(1.05);
        }

        /* Modernize Cards - Soft UI */
        .card {
            border: 1px solid rgba(255,255,255,0.6);
            border-radius: 0.875rem; /* Rounded XL */
            box-shadow: 0 8px 32px rgba(19, 25, 32, 0.05) !important;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            overflow: hidden;
            backdrop-filter: blur(4px);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(19, 25, 32, 0.08) !important;
            border-color: rgba(21, 131, 104, 0.2); /* Hint of Primary */
        }
        .card-img-top {
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card:hover .card-img-top {
            transform: scale(1.08);
        }

        /* Modern Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            letter-spacing: -0.5px;
        }
        p {
            line-height: 1.7;
            color: #555;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--uerd-primary), var(--uerd-accent));
            border-radius: 5px;
        }

        /* Accessible, interactive focus rings */
        :focus-visible {
            outline: 3px solid rgba(240, 180, 41, 0.45);
            outline-offset: 2px;
        }

        /* Respect reduced motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
            }
        }
        
        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
    @stack('css')
</head>
<body class="@yield('body_class')">
    @include('header')

        @yield('content')

    @include('footer')

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    {{-- <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
        });
    </script> --}}

    @stack('js')

</body>
</html>
