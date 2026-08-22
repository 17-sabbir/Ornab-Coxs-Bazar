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
    {{-- Frontend fonts: Poppins (headings) + Inter (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
        /* Frontend fonts: Poppins (headings) + Inter (body) */
        body {
            font-family: var(--font-body) !important;
            background-color: var(--brand-bg); /* Canvas */
            color: var(--brand-text); /* Ink */
            -webkit-font-smoothing: antialiased;
        }

        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6,
        .display-1, .display-2, .display-3, .display-4, .display-5, .display-6,
        .navbar-brand, .card-title, .modal-title {
            font-family: var(--font-heading) !important;
        }

        :root {
            --ornab-primary: var(--primary-color);
            --ornab-secondary: var(--secondary-color);
            --ornab-accent: var(--accent-color);
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
            background-color: var(--brand-coral); /* Urgency Rose */
            border: none;
            box-shadow: 0 4px 14px 0 rgba(230, 25, 50, 0.39);
        }
        
        .btn-primary {
            background: var(--ornab-primary) !important;
            border: 1px solid var(--ornab-primary) !important;
            color: var(--brand-white) !important;
            box-shadow: 0 4px 14px 0 rgba(21, 131, 104, 0.39); /* Teal Glow */
        }
        .btn-primary:hover {
            filter: brightness(1.1);
            box-shadow: 0 6px 20px rgba(21, 131, 104, 0.23);
        }

        .btn-warning {
            background: var(--ornab-accent) !important;
            border-color: var(--ornab-accent) !important;
            color: var(--brand-white) !important; /* Better contrast */
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
            color: var(--brand-text);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        /* dfgvhbjnk */
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--ornab-primary), var(--ornab-accent));
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

    {{-- Google Translate UI hide styles --}}
    <style>
        .goog-te-banner-frame.skiptranslate,
        iframe.goog-te-banner-frame,
        .goog-te-gadget-icon,
        .goog-te-balloon-frame,
        .goog-tooltip,
        .goog-tooltip:hover,
        .goog-te-gadget-simple,
        .goog-te-gadget span,
        .goog-te-ftab,
        .goog-te-ftab-link,
        .goog-te-menu-frame,
        .goog-te-spinner-pos,
        #goog-gt-tt,
        .goog-text-highlight {
            display: none !important;
            visibility: hidden !important;
        }

        body {
            top: 0 !important;
            position: static !important;
        }

        #google_translate_element {
            position: fixed !important;
            right: 16px !important;
            bottom: 16px !important;
            left: auto !important;
            top: auto !important;
            z-index: 9999 !important;
        }

        .goog-te-gadget {
            position: fixed !important;
            right: 16px !important;
            bottom: 16px !important;
            left: auto !important;
            top: auto !important;
            z-index: 9999 !important;
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

    {{-- Google Translate Widget --}}
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                includedLanguages: 'en,bn',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false
            }, 'google_translate_element');
        }

        // Load Google Translate script
        var gtScript = document.createElement('script');
        gtScript.type = 'text/javascript';
        gtScript.async = true;
        gtScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(gtScript);
    </script>
    <div id="google_translate_element"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var langToggle = document.getElementById('langToggle');
            var hideGoogleTranslate = function() {
                var iframes = document.querySelectorAll('iframe.goog-te-banner-frame, iframe.goog-te-floatbar-frame, .goog-te-banner-frame, .goog-te-floatbar');
                iframes.forEach(function(iframe) {
                    iframe.style.setProperty('display', 'none', 'important');
                    iframe.style.setProperty('visibility', 'hidden', 'important');
                    iframe.style.setProperty('opacity', '0', 'important');
                    iframe.style.setProperty('position', 'fixed', 'important');
                    iframe.style.setProperty('top', '-9999px', 'important');
                    iframe.style.setProperty('z-index', '-9999', 'important');
                    iframe.style.setProperty('pointer-events', 'none', 'important');
                });

                var gadgets = document.querySelectorAll('.goog-te-gadget, .goog-te-floatbar, .skiptranslate');
                gadgets.forEach(function(gadget) {
                    gadget.style.setProperty('display', 'none', 'important');
                    gadget.style.setProperty('visibility', 'hidden', 'important');
                    gadget.style.setProperty('opacity', '0', 'important');
                    gadget.style.setProperty('position', 'absolute', 'important');
                    gadget.style.setProperty('top', '-9999px', 'important');
                });

                // Google re-applies the loading spinner's own inline style (with !important)
                // while translation is in progress, which beats our stylesheet rule.
                // We have to fight it the same way it fights us: force-hide via JS on every
                // tick, and remove it from the DOM outright so it can't reappear.
                var spinners = document.querySelectorAll('.goog-te-spinner-pos, .goog-te-spinner-animation, .goog-te-spinner');
                spinners.forEach(function(spinner) {
                    spinner.style.setProperty('display', 'none', 'important');
                    spinner.style.setProperty('visibility', 'hidden', 'important');
                    spinner.style.setProperty('opacity', '0', 'important');
                    if (spinner.parentNode) {
                        spinner.parentNode.removeChild(spinner);
                    }
                });

                document.body.style.setProperty('top', '0px', 'important');
                document.body.style.setProperty('position', 'static', 'important');
            };

            hideGoogleTranslate();
            setInterval(hideGoogleTranslate, 300);

            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes) {
                        mutation.addedNodes.forEach(function(node) {
                            if (node.nodeType === 1) {
                                if (node.className && typeof node.className === 'string' && 
                                    (node.className.includes('goog-te') || node.className.includes('skiptranslate'))) {
                                    hideGoogleTranslate();
                                }
                                if (node.querySelectorAll) {
                                    var gtElements = node.querySelectorAll('.goog-te-banner-frame, .goog-te-gadget, .goog-te-floatbar, .skiptranslate, .goog-te-spinner-pos, .goog-te-spinner-animation, .goog-te-spinner');
                                    if (gtElements.length > 0) {
                                        hideGoogleTranslate();
                                    }
                                }
                            }
                        });
                    }
                });
            });

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        observer.observe(document.body, { childList: true, subtree: true });
                    }, 100);
                });
            } else {
                setTimeout(function() {
                    observer.observe(document.body, { childList: true, subtree: true });
                }, 100);
            }

            window.addEventListener('load', function() {
                setTimeout(hideGoogleTranslate, 100);
                setTimeout(hideGoogleTranslate, 500);
                setTimeout(hideGoogleTranslate, 1000);
                setTimeout(hideGoogleTranslate, 2000);
            });

            // --- Cookie-based language switching ---
            function getGoogTransCookie() {
                var match = document.cookie.match(/(?:^|;\s*)googtrans=([^;]*)/);
                return match ? decodeURIComponent(match[1]) : '';
            }

            function setGoogTransCookie(targetLang) {
                var value = targetLang ? ('/en/' + targetLang) : '';
                var hostname = window.location.hostname;
                var isLocalHost = (hostname === 'localhost' || hostname === '127.0.0.1' || hostname === '');

                if (!value) {
                    document.cookie = 'googtrans=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC';
                    if (!isLocalHost) {
                        document.cookie = 'googtrans=; path=/; domain=' + hostname + '; expires=Thu, 01 Jan 1970 00:00:00 UTC';
                        document.cookie = 'googtrans=; path=/; domain=.' + hostname + '; expires=Thu, 01 Jan 1970 00:00:00 UTC';
                    }
                    return;
                }

                document.cookie = 'googtrans=' + value + '; path=/';
                if (!isLocalHost) {
                    document.cookie = 'googtrans=' + value + '; path=/; domain=' + hostname;
                    document.cookie = 'googtrans=' + value + '; path=/; domain=.' + hostname;
                }
            }

            // Reflect current state in the toggle label on load
            (function initLangLabel() {
                var current = getGoogTransCookie();
                var enOption = langToggle ? langToggle.querySelector('[data-lang="en"]') : null;
                var bnOption = langToggle ? langToggle.querySelector('[data-lang="bn"]') : null;
                var isBN = current === '/en/bn';

                if (isBN) {
                    if (langToggle) langToggle.classList.add('bn-active');
                    if (bnOption) {
                        bnOption.classList.add('active');
                        bnOption.textContent = 'বাংলা';
                    }
                    if (enOption) {
                        enOption.classList.remove('active');
                        enOption.textContent = 'ইংরেজি';
                    }
                } else {
                    if (langToggle) langToggle.classList.remove('bn-active');
                    if (enOption) {
                        enOption.classList.add('active');
                        enOption.textContent = 'EN';
                    }
                    if (bnOption) {
                        bnOption.classList.remove('active');
                        bnOption.textContent = 'BN';
                    }
                }
            })();

            if (langToggle) {
                langToggle.addEventListener('click', function() {
                    var current = getGoogTransCookie();
                    var enOption = langToggle.querySelector('[data-lang="en"]');
                    var bnOption = langToggle.querySelector('[data-lang="bn"]');
                    var isBN = current === '/en/bn';

                    if (!isBN) {
                        setGoogTransCookie('bn');
                        langToggle.classList.add('bn-active');
                        if (bnOption) {
                            bnOption.classList.add('active');
                            bnOption.textContent = 'বাংলা';
                        }
                        if (enOption) {
                            enOption.classList.remove('active');
                            enOption.textContent = 'ইংরেজি';
                        }
                    } else {
                        setGoogTransCookie(null);
                        langToggle.classList.remove('bn-active');
                        if (enOption) {
                            enOption.classList.add('active');
                            enOption.textContent = 'EN';
                        }
                        if (bnOption) {
                            bnOption.classList.remove('active');
                            bnOption.textContent = 'BN';
                        }
                    }
                    window.location.reload();
                });
            }
        });
    </script>

    @stack('js')

</body>
</html>