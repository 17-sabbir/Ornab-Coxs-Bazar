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
            background: var(--brand-orange);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 250ms cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 1;
            box-shadow: 0 2px 4px rgba(249, 116, 21, 0.4);
        }
        .site-header .nav-link:hover::after,
        .site-header .nav-link:focus-visible::after,
        .site-header .nav-link.active::after {
            transform: scaleX(1);
        }

        @media (min-width: 992px) and (max-width: 1399.98px) {
            .navbar .navbar-nav { column-gap: 4px !important; }
            .navbar .navbar-nav .nav-link { padding-left: .5rem; padding-right: .5rem; }
            .navbar .navbar-brand span { font-size: 17px !important; }
        }
        
        /* Home Page Header Styles */
        body.is-home .site-header {
            background-color: transparent;
            border-bottom: none !important;
            padding-top: 20px;
        }
        
        body.is-home .site-header .navbar {
            background-color: transparent !important;
            backdrop-filter: none !important;
            border-bottom: none !important;
            box-shadow: none !important;
        }

        body.is-home .site-header .nav-link,
        body.is-home .site-header .navbar-brand span {
            color: #ffffff !important;
            text-shadow: 0 1px 12px rgba(0,0,0,0.2);
        }

        body.is-home.scrolled .site-header {
            padding-top: 0;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05); /* Soft glass shadow */
        }

        body.is-home.scrolled .site-header .navbar {
             background-color: transparent !important;
        }

        body.is-home.scrolled .site-header .nav-link, 
        body.is-home.scrolled .site-header .navbar-brand * {
            color: var(--secondary-color) !important; /* Ink */
            text-shadow: none;
        }
        
        /* Logo Styles */
        .brand-logo-container {
            width: 48px;
            height: 48px;
            /* background: linear-gradient(135deg, var(--primary-color), #0d5f49); */
            background: #fff; /* Ensure white background for transparent images if any, also nice for logos */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Subtle shadow for depth */
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
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            font-size: 1.1rem; /* reduced */
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.75rem; /* reduced */
            font-weight: 500;
            opacity: 0.9;
            margin-top: 2px;
        }
        
        /* Ensure normal pages keep default look */
        body:not(.is-home) .site-header {
            position: relative;
        }
    </style>
    <div class="container-fluid px-2 px-lg-3">
        <nav class="navbar navbar-expand-xl navbar-light py-2 py-lg-3" style="position: static;">
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
                    {{-- <li><a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a></li> --}}
                    <li><a class="dropdown-item" href="{{ route('ongoing.project') }}">{{ 'Ongoing Programs' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('project.archieve') }}">{{ 'Project Archieve' }}</a></li>
                </ul>
                </li>

                <!-- Transparency -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="transparencyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Transparency' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="transparencyDropdown">
                    <li><a class="dropdown-item" href="{{ route('annual.reports') }}">{{ 'Annual Reports' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('financial.statements') }}">{{ 'Financial Statements' }}</a></li>
                </ul>
                </li>

                <!-- Get Involved -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="involvedDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Get Involved' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="involvedDropdown">
                    <li><a class="dropdown-item" href="{{ route('invoked.career') }}">{{ 'Career' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('fundraising') }}">{{ 'Fundraising Campaign' }}</a></li>
                </ul>
                </li>

                <!-- Media Center -->
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle fw-bold text-dark" href="#" id="eventsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ 'Media Center' }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                    <li><a class="dropdown-item" href="{{ route('latest.news.all') }}">{{ 'Latest News' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('gallery.albums') }}">{{ 'Photo Gallery' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('youtube.video') }}">{{ 'Youtube Videos' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('publication') }}">{{ 'Publications' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('strategic.plan') }}">{{ 'Strategic Plan' }}</a></li>
                    <li><a class="dropdown-item" href="{{ route('policy.guideline') }}">{{ 'Policy & Guideline' }}</a></li>
                </ul>
                </li>

                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center" style="column-gap: 20px;">
                <!-- Contact -->
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link text-dark" style="font-weight: 500; font-size: 1.05rem;">{{ 'Contact' }}</a></li>
                    <li class="nav-item"><a href="{{ route('donate') }}" class="btn d-inline-flex align-items-center justify-content-center gap-2 text-white" style="border-radius: 50px; background-color: #EA9918; border: none; padding: 10px 30px; font-weight: 600; font-size: 1.05rem; box-shadow: none;"><i class="fa-regular fa-heart"></i> {{ 'Donate' }}</a></li>
                </ul>
            </div>
        </div>
    </nav>


  </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(){
        // Header Scroll Effect for Home Page
        if(document.body.classList.contains('is-home')){
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    document.body.classList.add('scrolled');
                } else {
                    document.body.classList.remove('scrolled');
                }
            });
            // Initial check
            if (window.scrollY > 50) {
                document.body.classList.add('scrolled');
            }
        }
    });
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
