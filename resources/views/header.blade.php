<header id="site-header" class="site-header fixed-top" style="z-index: 1000; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
    <style>
        .site-header .nav-link {
            position: relative;
            transition: color 200ms ease;
            font-weight: 500;
        }
        .site-header .nav-link::after {
            content: "";
            position: absolute;
            left: 0.5rem;
            right: 0.5rem;
            bottom: 0.2rem;
            height: 3px;
            border-radius: 999px;
            background: var(--brand-coral);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 250ms cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 1;
            box-shadow: 0 2px 4px rgba(242, 169, 126, 0.4);
        }
        .site-header .nav-link:hover::after,
        .site-header .nav-link:focus-visible::after,
        .site-header .nav-link.active::after {
            transform: scaleX(1);
        }

        @media (min-width: 992px) and (max-width: 1399.98px) {
            .navbar .navbar-nav { column-gap: 3px !important; }
            .navbar .navbar-nav .nav-link { padding-left: .45rem; padding-right: .45rem; }
            .navbar .navbar-brand span { font-size: 16px !important; }
        }
        
        /* Home Page Header Styles - Fixed Light Header */
        body.is-home .site-header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--brand-border) !important;
            padding-top: 8px;
            padding-bottom: 8px;
            box-shadow: 0 1px 10px rgba(0, 0, 0, 0.05);
        }
        
        body.is-home .site-header .navbar {
            background-color: transparent !important;
            backdrop-filter: none !important;
            border-bottom: none !important;
            box-shadow: none !important;
            padding-top: 0;
            padding-bottom: 0;
        }

        body.is-home .site-header .nav-link,
        body.is-home .site-header .navbar-brand span {
            color: var(--brand-text) !important;
            text-shadow: none;
        }
        
        /* Logo Styles */
        .brand-logo-container {
            width: 44px;
            height: 44px;
            /* background: linear-gradient(135deg, var(--primary-color), #0d5f49); */
            background: #fff; /* Ensure white background for transparent images if any, also nice for logos */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08); /* Subtle shadow for depth */
            overflow: hidden; /* Ensure image stays inside */
        }
        
        .brand-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Fill the circle */
            /* Removed filter to show original colors */
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1;
        }
        
        .brand-title {
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.05rem; /* moderate */
            letter-spacing: -0.5px;
            line-height: 1.15;
        }

        .brand-subtitle {
            font-family: var(--font-body);
            font-size: 0.75rem; /* moderate */
            font-weight: 500;
            opacity: 0.9;
            margin-top: 2px;
            line-height: 1.2;
        }
        
        /* Ensure normal pages keep default look */
        body:not(.is-home) .site-header {
            position: relative;
        }

        /* Language Toggle Button */
        .lang-toggle-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            background: transparent;
            border: 2px solid var(--primary-color);
            border-radius: 9999px;
            padding: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 110px;
            height: 34px;
            overflow: hidden;
        }

        .lang-toggle-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 168, 201, 0.2);
        }

        .lang-option {
            position: relative;
            z-index: 2;
            flex: 1;
            text-align: center;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
            color: var(--primary-color);
            transition: color 0.3s ease;
            user-select: none;
            white-space: nowrap;
            line-height: 1.2;
            padding: 0 4px;
        }

        .lang-option.active {
            color: #ffffff;
        }

        .lang-slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: calc(50% - 3px);
            height: calc(100% - 6px);
            background: var(--primary-color);
            border-radius: 9999px;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
        }

        .lang-toggle-btn.bn-active .lang-slider {
            transform: translateX(100%);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: var(--brand-navy);
            }
            .navbar-collapse .nav-link,
            .navbar-collapse .dropdown-item,
            .navbar-collapse .dropdown-menu {
                background: var(--brand-navy);
                color: #fff !important;
            }
            .navbar-collapse .nav-link:hover,
            .navbar-collapse .nav-link:focus,
            .navbar-collapse .nav-link.active,
            .navbar-collapse .dropdown-item:hover,
            .navbar-collapse .dropdown-item:focus {
                color: var(--brand-coral) !important;
            }
        }
    </style>
    <div class="container-fluid px-2 px-lg-3">
        <nav class="navbar navbar-expand-xl navbar-light py-1 py-lg-2" style="position: static;">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" style="gap: 0; padding: 0;">
                <div class="brand-logo-container">
                    {{-- Dynamic logo: use uploaded logo if set, else fall back to static --}}
                    @php $appSettings = application(); @endphp
                    <img src="{{ $appSettings && !empty($appSettings->main_logo) ? asset('images/application/'.$appSettings->main_logo) : asset('images/application/ornab-logo.png') }}" alt="Ornab Coxs Bazar" class="brand-logo-img" style="border-radius: 50%;"> 
                </div>
                <div class="brand-text">
                    <span class="brand-title">{{ $appSettings->site_name ?? 'Ornab Cox\'s Bazar' }}</span>
                    <span class="brand-subtitle">Cox's Bazar</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse align-items-lg-center" id="navbarNav">
                <ul class="navbar-nav mx-auto" style="column-gap: 20px;">
                    <!-- Home -->
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link fw-bold text-dark">{{ 'Home' }}</a></li>
                <!-- About us -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ 'About us' }}
                    </a>
                <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                    <li><a class="dropdown-item" href="{{ route('about.us') }}">{{ 'Our Story' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('vision.mission') }}">{{ 'Mission & Vision' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('team.members') }}">{{ 'Team Member' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('board.of.directors') }}">{{ 'Board of Directors' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('origin_affilation') }}">{{ 'Origin and Legal Affiliation' }}</a></li>
                </ul>
                </li>

                <!-- Programs -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="programsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Programs' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="programsDropdown">
                    <li><a class="dropdown-item" href="{{ route('frontend.projects') }}">{{ 'Our Projects' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('project.archieve') }}">{{ 'Project Archieve' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('ongoing.project') }}">{{ 'Ongoing Programs' }}</a></li>
                </ul>
                </li>

                <!-- Transparency -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="transparencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Transparency' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="transparencyDropdown">
                    <li><a class="dropdown-item" href="{{ route('publication') }}">{{ 'Publications' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('strategic.plan') }}">{{ 'Strategic Plan' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('annual.reports') }}">{{ 'Annual Reports' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('financial.statements') }}">{{ 'Financial & Audit Reports' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('policy.guideline') }}">{{ 'Policy & Guideline' }}</a></li>
                </ul>
                </li>

                <!-- Get Involved -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="involvedDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Get Involved' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="involvedDropdown">
                    <li><a class="dropdown-item" href="{{ route('invoked.career') }}">{{ 'Career' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('donate') }}">{{ 'Donation' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('volunteer.index') }}">{{ 'Volunteer' }}</a></li>
                </ul>
                </li>

                <!-- Media Center -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Media Center' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                    <li><a class="dropdown-item" href="{{ route('notices.all') }}">{{ 'Notices' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('latest.news.all') }}">{{ 'Latest News' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('gallery.albums') }}">{{ 'Photo Gallery' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('youtube.video') }}">{{ 'Youtube Videos' }}</a></li>
                </ul>
                </li>

                </ul>

                <ul class="navbar-nav mb-1 mb-lg-0 align-items-lg-center" style="column-gap: 4px; margin-left: 4px;">
                <!-- Language Switcher -->
                <li class="nav-item">
                    <button id="langToggle" class="lang-toggle-btn" title="Switch Language">
                        <span class="lang-slider"></span>
                        <span class="lang-option" data-lang="en">EN</span>
                        <span class="lang-option" data-lang="bn">BN</span>
                    </button>
                </li>
                <!-- Contact -->
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link fw-bold text-dark" style="font-size: 1.02rem;">{{ 'Contact' }}</a></li>
                </ul>
            </div>
        </div>
    </nav>


  </div>
</div>

<script>
    // Scroll effect removed: header now stays in fixed light state on all pages.
</script>

<script>
    document.addEventListener("DOMContentLoaded", function(){
    // make it as accordion for smaller screens
    if (window.innerWidth >= 1200) {
        document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            everyitem.addEventListener('mouseover', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');
                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.add('show');
                    nextEl.classList.add('show');
                }
            });
            everyitem.addEventListener('mouseleave', function(e){
                let el_link = this.querySelector('a[data-bs-toggle]');

                if(el_link != null){
                    let nextEl = el_link.nextElementSibling;
                    el_link.classList.remove('show');
                    nextEl.classList.remove('show');
                }
            })
        });
        }
    });
</script>

</header>
