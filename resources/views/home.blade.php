@extends('main')

@section('body_class', 'is-home')

@section('title')
Ornab Coxs Bazar
@endsection

@section('content')
{{-- slider --}}
<style>
    .hero-subtitle {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        padding: 8px 20px;
        border-radius: 9990px; /* Pill */
        display: inline-block;
        font-size: 0.85rem;
        letter-spacing: 2px;
        color: var(--brand-gold); /* Highlight */
        border: 1px solid rgba(252, 211, 47, 0.3);
        margin-bottom: 16px;
        text-transform: uppercase;
        font-weight: 700;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin-left: 10px; 
    }
    
    .hero-title {
        font-family: var(--font-heading); 
        font-size: 3rem; 
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 16px;
        letter-spacing: -0.02em;
        max-width: 900px;
        text-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    .hero-indented {
        padding-left: 60px; /* Only the 2nd part moves right */
    }

    @@media (max-width: 575.98px) {
        .hero-indented { padding-left: 0; }
        .hero-title { font-size: 3rem; }
        .hero-subtitle { margin-left: 0; }
    }

    .typewriter-cursor {
        display: inline;
        position: relative;
    }

    .typewriter-cursor::after {
        content: "";
        display: inline-block;
        width: 3px;
        height: 1em;
        margin-left: 8px;
        background: var(--accent-color);
        vertical-align: -0.12em;
        animation: tw-blink 0.9s step-end infinite;
    }

    @@keyframes tw-blink {
        50% { opacity: 0; }
    }
    
    .hero-desc {
        font-size: 1.25rem;
        max-width: 700px;
        margin-bottom: 24px;
        line-height: 1.6;
        color: var(--brand-white); /* Ensure white color */
        text-shadow: 2px 2px 4px rgba(0,0,0,0.7); /* Improved shadow for visibility */
    }

    /* Curved bottom edge on the hero slider */
    .hero-curve {
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 120px;
        z-index: 2;
        pointer-events: none;
    }

    /* Scroll-down indicator, centered over the curve */
    .hero-scroll-indicator {
        position: absolute;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        width: 28px;
        height: 44px;
        border: 2px solid rgba(255, 255, 255, 0.85);
        border-radius: 16px;
        display: flex;
        justify-content: center;
        padding-top: 8px;
        z-index: 3;
        cursor: pointer;
    }

    .hero-scroll-indicator .dot {
        width: 4px;
        height: 10px;
        background: #ffffff;
        border-radius: 2px;
        animation: hero-scroll-bounce 1.6s infinite;
    }

    @@keyframes hero-scroll-bounce {
        0%   { opacity: 1; transform: translateY(0); }
        60%  { opacity: 0.2; transform: translateY(10px); }
        100% { opacity: 0; transform: translateY(10px); }
    }

    @@media (max-width: 575.98px) {
        .hero-curve { height: 60px; }
        .hero-scroll-indicator { bottom: 14px; width: 24px; height: 36px; }
    }
    
    .btn-hero-primary {
        background-color: var(--brand-coral);
        color: #fff;
        border: none;
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 14px 0 rgba(242, 169, 126, 0.39);
    }

    .btn-hero-primary:hover {
        background-color: #DF9B74;
        transform: translateY(-2px);
        color: #fff;
        box-shadow: 0 6px 20px rgba(242, 169, 126, 0.35);
    }

    .btn-hero-secondary {
        background-color: rgba(10, 15, 12, 0.55);
        backdrop-filter: blur(10px);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.25);
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 600;
        font-size: 1rem;
        margin-left: 20px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-hero-secondary:hover {
        background-color: rgba(10, 15, 12, 0.75);
        transform: translateY(-2px);
        color: white;
        border-color: rgba(255, 255, 255, 0.45);
    }

    /* Watch/Story pill button (matches provided design) */
    .btn-watch-story {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 26px;
        border-radius: 999px;
        background: linear-gradient(90deg, rgba(48,30,12,0.95) 0%, rgba(36,46,18,0.95) 100%);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.06);
        box-shadow: 0 6px 18px rgba(0,0,0,0.25);
        font-weight: 700;
        text-decoration: none;
    }
    .btn-watch-story i {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.06);
        border-radius: 999px;
        font-size: 0.95rem;
    }
    .btn-watch-story:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(0,0,0,0.32);
        text-decoration: none;
    }

    /* Slider Arrows */
    .carousel-control-prev, .carousel-control-next {
        width: 50px;
        height: 50px;
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        backdrop-filter: blur(5px);
        opacity: 0.8;
        margin: 0 20px;
    }
    .carousel-control-prev:hover, .carousel-control-next:hover {
        background-color: rgba(255, 255, 255, 0.4);
        opacity: 1;
    }
    
    /* Dots at bottom */
    .carousel-indicators [data-bs-target] {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border: none;
    }
    .carousel-indicators .active {
        background-color: var(--accent-color);
        width: 25px;
        border-radius: 5px; /* Pill shape for active */
    }

    /* Remove right-side padding/spacing on home full-width pager (carousel) */
    body.is-home {
        overflow-x: hidden; /* prevent small horizontal gaps */
    }
    body.is-home .carousel,
    body.is-home .carousel-inner,
    body.is-home .carousel-item {
        margin-right: 0 !important;
        padding-right: 0 !important;
    }
    /* Remove extra margin on carousel controls that created visible gap */
    body.is-home .carousel-control-prev,
    body.is-home .carousel-control-next {
        margin: 0 !important;
    }
</style>

{{-- Home design tokens (color + spacing consistency) --}}
<style>
    :root {
        --ornab-green: var(--brand-navy);
        --ornab-accent: var(--brand-coral);
        --ornab-accent-strong: #DF9B74; /* Darker Coral */
        --ornab-soft-bg: rgba(18, 43, 107, 0.04); /* Soft Navy Bg */
        --ornab-muted: #64748b; /* Slate 500 */
        --ornab-card-border: var(--brand-border);
        --ornab-card-shadow: 0 10px 30px -4px rgba(0, 0, 0, 0.05); /* Softer, larger shadow */
    }

    .ornab-section {
        padding: 2rem 0;
    }
    @@media (min-width: 992px) {
        .ornab-section {
            padding: 2.5rem 0;
        }
    }

    /* Reduce stacked section gap (used only where applied) */
    .ornab-section-tight-top {
        padding-top: 1.5rem;
    }
    .ornab-section-tight-bottom {
        padding-bottom: 1.5rem;
    }
    @@media (min-width: 992px) {
        .ornab-section-tight-top {
            padding-top: 2rem;
        }
        .ornab-section-tight-bottom {
            padding-bottom: 2rem;
        }
    }

    .ornab-soft-section {
        background-color: var(--ornab-soft-bg);
    }

    .ornab-btn-pill {
        border-radius: 9999px;
        padding: 14px 32px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: 0.3px;
    }

    .ornab-btn-pill:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
    }

    .ornab-card-hover {
        border-radius: 0.875rem; /* Rounded xl */
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--ornab-card-border);
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
    }
    .ornab-card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 40px -4px rgba(18, 43, 107, 0.08); /* Colored shadow hint */
        border-color: rgba(18, 43, 107, 0.15);
    }

    .ornab-cta-text {
        background-color: transparent !important;
        color: var(--brand-teal) !important;
        text-decoration: none;
        border: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
    .ornab-cta-text:hover {
        text-decoration: underline;
        text-underline-offset: 4px;
        color: var(--brand-navy) !important;
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide m-0 p-0" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach ($slider as $skey => $slider_item)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $skey }}" class="{{ $skey == 0 ? 'active' : '' }}" aria-current="{{ $skey == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $skey + 1 }}"></button>
        @endforeach
    </div>

    <div class="carousel-inner">
        @foreach ($slider as $skey => $slider)
        <div class="carousel-item @if($skey == 0) active @endif">
            <div style="position: relative; height: 100vh; overflow: hidden;"> <!-- Full viewport height -->
                <img src="{{ asset('images/slider/'.$slider->image) }}" class="d-block w-100" alt="ORNAB" style="object-fit: cover; height: 100%; width: 100%;">
                
                {{-- Navy-to-Coral Gradient Overlay --}}
                <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to bottom, rgba(18,43,107,0.75) 0%, rgba(242,169,126,0.25) 100%);"></div>

                {{-- Curved shape --}}
                <svg class="hero-curve" viewBox="0 0 1200 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,120 L0,45 Q600,175 1200,45 L1200,120 Z" fill="#ffffff"></path>
                </svg>

                {{-- Scroll indicator --}}
                <div class="hero-scroll-indicator" onclick="document.querySelector('.ornab-soft-section')?.scrollIntoView({behavior:'smooth'})">
                    <span class="dot"></span>
                </div>

                <div class="container-fluid h-100 position-absolute top-0 start-0 px-0">
                    <div class="d-flex flex-column justify-content-center h-100 text-white">
                        <div class="hero-indented"> <!-- Indented Content -->
                            <h2 class="hero-title">
                                <span class="js-typewriter typewriter-cursor hero-title-text notranslate" data-text="{{ e($slider->title) }}" data-text-bn="{{ e($slider->title_bn) }}">{{ $slider->title }}</span>
                            </h2>

                            <p class="hero-desc">
                                <span class="js-typewriter hero-desc-text notranslate" data-text="{{ e($slider->description) }}" data-text-bn="{{ e($slider->description_bn) }}">{{ $slider->description }}</span>
                            </p>

                            <div class="d-flex flex-wrap gap-3 align-items-center mt-3">
                                <a href="{{ route('frontend.projects') }}" class="btn btn-hero-primary">
                                    Explore Our Projects <i class="fa-solid fa-arrow-right"></i>
                                </a>
                                <a href="{{ route('donate') }}" class="btn btn-hero-secondary">
                                    Donate Now <i class="fa-solid fa-heart"></i>
                                </a>
                            </div>
                        </div> <!-- End Indented Content -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
        
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- end of slide --}}

{{-- Who we are (Empowering Lives moved to Highlights section) --}}
<!-- <div class="bg-light"> ... moved below ... </div> -->
{{-- End of who we are --}}

{{-- Highlights (from provided design) --}}
<div class="ornab-soft-section ornab-section" style="padding-top: 1.5rem; padding-bottom: 1.5rem; margin-top: -20px;">
    <style>
        /* Highlights cards (matches provided screenshot) */
        .ornab-highlights-card {
            border-radius: 2.25rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }
        
        .ornab-highlights-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1) !important;
        }

        .ornab-highlights-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            transition: transform 0.4s ease;
        }
        
        .ornab-highlights-card:hover .ornab-highlights-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .ornab-highlights-underline {
            width: 72px;
            height: 5px;
            border-radius: 3px;
            background-color: var(--ornab-accent-strong);
        }
    </style>

    {{-- First "Our Impact" section removed as requested --}}
    
    {{-- Our Impact Section (New Insertion) --}}
    <section class="ornab-impact-section position-relative">
        <style>
            .ornab-impact-section {
                background-color: transparent;
                padding: 1.25rem 1.5rem;
                color: var(--brand-text);
            }
            @media (min-width: 992px) {
                .ornab-impact-section { padding-left: 2rem; padding-right: 2rem; }
            }
            @media (min-width: 1400px) {
                .ornab-impact-section { padding-left: 2.5rem; padding-right: 2.5rem; }
            }

            .ornab-impact-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 16px;
                background: var(--brand-bg);
                border: 1px solid rgba(18, 43, 107, 0.15);
                border-radius: 50px;
                font-size: 0.78rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 1.2px;
                margin-bottom: 16px;
                color: var(--brand-navy);
                box-shadow: 0 4px 12px rgba(0,0,0,0.04);
            }

            .ornab-impact-heading {
                font-size: 2.6rem;
                font-weight: 800;
                line-height: 1.15;
                margin-bottom: 16px;
                color: var(--brand-navy);
            }
            .ornab-impact-heading .ornab-impact-heading-accent {
                color: var(--brand-coral);
            }

            .ornab-impact-text {
                font-size: 1.05rem;
                line-height: 1.8;
                font-weight: 400;
                color: var(--brand-text);
                max-width: 90%;
            }

            .ornab-glass-card {
                background: #ffffff;
                border: 1px solid var(--brand-border);
                border-radius: 20px;
                padding: 24px 20px;
                text-align: center;
                height: 100%;
                transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            }
            .ornab-glass-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 16px 32px rgba(0, 0, 0, 0.08);
            }

            .ornab-impact-section .row > .col-6:nth-child(odd) .ornab-glass-icon {
                width: 46px;
                height: 46px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(79, 168, 201, 0.10);
                color: var(--brand-teal);
                font-size: 1.3rem;
                margin-bottom: 14px;
            }
            .ornab-impact-section .row > .col-6:nth-child(even) .ornab-glass-icon {
                width: 46px;
                height: 46px;
                border-radius: 50%;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(76, 122, 61, 0.10);
                color: var(--brand-green);
                font-size: 1.3rem;
                margin-bottom: 14px;
            }

            .ornab-glass-stat {
                font-size: 2.2rem;
                font-weight: 900;
                margin-bottom: 4px;
                line-height: 1;
                color: var(--brand-navy);
            }

            .ornab-glass-label {
                font-size: 0.85rem;
                text-transform: none;
                letter-spacing: 0.2px;
                font-weight: 600;
                color: var(--brand-text);
            }
        </style>

        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" style="padding: 1.5rem;">
                    <span class="ornab-impact-badge"><i class="fa-solid fa-check"></i> Our Impact</span>
                    <h2 class="ornab-impact-heading">Over 18 Years of <span class="ornab-impact-heading-accent">Changing Lives</span></h2>
                    <p class="ornab-impact-text lead mb-4">
                        Since 2008, Ornab Cox's Bazar has served underprivileged communities in Cox's Bazar, with a focus on women, adolescents, and children. Through education, health, skills training, and community mobilization, we empower families and build sustainable change across the district.
                    </p>
                    <a href="{{ route('about.us') }}" class="ornab-cta-text d-inline-flex align-items-center gap-2" style="font-weight: 700;">
                        Learn More About Us <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="col-lg-7" style="padding: 1.5rem;">
                    <div class="row g-4">
                        <div class="col-6">
                            <div class="ornab-glass-card">
                                <div class="ornab-glass-icon"><i class="fa-regular fa-hand-holding-heart"></i></div>
                                <div class="ornab-glass-stat count-up" data-target="{{ $statistics->statistics_donors ?? 0 }}" data-suffix="+">0</div>
                                <div class="ornab-glass-label">Donors</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ornab-glass-card">
                                <div class="ornab-glass-icon"><i class="fa-solid fa-people-carry-box"></i></div>
                                <div class="ornab-glass-stat count-up" data-target="{{ $statistics->statistics_beneficiaries ?? 0 }}" data-suffix="+">0</div>
                                <div class="ornab-glass-label">Beneficiaries</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ornab-glass-card">
                                <div class="ornab-glass-icon"><i class="fa-solid fa-hands-holding-circle"></i></div>
                                <div class="ornab-glass-stat count-up" data-target="{{ $statistics->statistics_projects ?? ($projectsCount ?? 0) }}" data-suffix="+">0</div>
                                <div class="ornab-glass-label">Projects</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="ornab-glass-card">
                                <div class="ornab-glass-icon"><i class="fa-solid fa-users-viewfinder"></i></div>
                                <div class="ornab-glass-stat count-up" data-target="{{ $statistics->statistics_volunteers ?? 0 }}" data-suffix="+">0</div>
                                <div class="ornab-glass-label">Volunteers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const counters = document.querySelectorAll('.count-up');
                const decimalCounters = document.querySelectorAll('.count-up-decimal');
                const options = { threshold: 0.5 };

                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const counter = entry.target;
                            const target = +counter.getAttribute('data-target');
                            const isDecimal = counter.classList.contains('count-up-decimal');
                            const suffix = counter.getAttribute('data-suffix') || '';
                            const duration = 2000;
                            const increment = target / (duration / 16);

                            let current = 0;
                            const updateCounter = () => {
                                current += increment;
                                if (current < target) {
                                    if (isDecimal) {
                                        counter.innerText = current.toFixed(1) + suffix;
                                    } else {
                                        counter.innerText = (target < 10 ? Math.ceil(current).toString().padStart(2, '0') : Math.ceil(current)) + suffix;
                                    }
                                    requestAnimationFrame(updateCounter);
                                } else {
                                    if (isDecimal) {
                                        counter.innerText = target.toFixed(1) + suffix;
                                    } else {
                                        counter.innerText = (target < 10 ? target.toString().padStart(2, '0') : target) + suffix;
                                    }
                                }
                            };
                            updateCounter();
                            observer.unobserve(counter);
                        }
                    });
                }, options);

                counters.forEach(c => observer.observe(c));
                decimalCounters.forEach(c => observer.observe(c));
            });
        </script>
    </section>

</section>
</div>
{{-- End Highlights --}}

{{-- Mission & Vision Section --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center pt-3">
                <div class="d-flex justify-content-center mt-4">
                    <div style="width: 60px; height: 4px; background: var(--brand-navy); border-radius: 2px;"></div>
                </div>
                <h2 class="fw-bold mt-3 mb-0" style="color: var(--brand-navy); letter-spacing: -0.5px;">Mission & Vision</h2>
            </div>
        </div>

        @php
            $mission_vision_data = $mission_vision ?? null;
            $defaultMission = 'To strengthen communities\' capacity, address poverty\'s root causes, and ensure dignity, safety, and equal rights for all through justice and equal opportunities.';
            $defaultVision  = 'Establish poverty free society where community people enjoy their lives with dignity, safety, and equal rights.';
            $mission = (!empty($mission_vision_data) && !empty(trim($mission_vision_data->mission ?? '')))
                ? $mission_vision_data->mission
                : $defaultMission;
            $vision = (!empty($mission_vision_data) && !empty(trim($mission_vision_data->vision ?? '')))
                ? $mission_vision_data->vision
                : $defaultVision;
        @endphp

        <div class="row align-items-center g-5 mb-5 flex-lg-row-reverse">
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; flex: 0 0 auto; background: var(--brand-green); color: #fff;">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h2 class="fw-bold mb-0" style="color: var(--brand-navy);">Our Vision</h2>
                </div>
                <p style="color: var(--brand-text); line-height: 1.95; font-size: 1.02rem; text-align: justify;">{{ $vision }}</p>
            </div>
            <div class="col-lg-5">
                @if(!empty($mission_vision_data->vision_image))
                    <img src="{{ asset('images/about_us/'.$mission_vision_data->vision_image) }}" alt="Our Vision" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                @else
                    <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--brand-bg), #fff); min-height: 380px;">
                        <i class="fa-solid fa-eye" style="font-size: 5rem; color: var(--brand-green); opacity: .35;"></i>
                    </div>
                @endif
            </div>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; flex: 0 0 auto; background: var(--brand-green); color: #fff;">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h2 class="fw-bold mb-0" style="color: var(--brand-navy);">Our Mission</h2>
                </div>
                <p style="color: var(--brand-text); line-height: 1.95; font-size: 1.02rem; text-align: justify;">{{ $mission }}</p>
            </div>
            <div class="col-lg-5">
                @if(!empty($mission_vision_data->mission_image))
                    <img src="{{ asset('images/about_us/'.$mission_vision_data->mission_image) }}" alt="Our Mission" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                @else
                    <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--brand-bg), #fff); min-height: 380px;">
                        <i class="fa-solid fa-bullseye" style="font-size: 5rem; color: var(--brand-green); opacity: .35;"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
{{-- End Mission & Vision Section --}}

{{-- Focus Area --}}
<div class="py-3" style="background-color: var(--brand-bg);">
    <style>
        .program-card {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            height: 400px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
            background: #fff;
            border: 1px solid var(--brand-border);
        }
        .program-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.6) 40%, rgba(0, 0, 0, 0.2) 100%);
            pointer-events: none;
        }
        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px -5px rgba(18, 43, 107, 0.15);
        }
        .program-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }
        .program-card:hover img {
            transform: scale(1.1);
        }
        .program-card-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            z-index: 2;
            color: white;
            transform: translateY(10px);
            transition: transform 0.4s ease;
        }
        .program-card:hover .program-card-content {
            transform: translateY(0);
        }
        .program-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .program-desc {
            font-size: 0.95rem;
            opacity: 0.8;
            max-height: 0;
            overflow: hidden;
            margin-bottom: 0;
            transition: all 0.5s ease;
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.5;
        }
        .program-card:hover .program-desc {
            opacity: 1;
            max-height: 150px;
            margin-bottom: 1rem;
            margin-top: 0.5rem;
        }
        .program-btn {
            display: inline-block;
            background-color: var(--brand-coral);
            color: #fff;
            padding: 10px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease 0.1s;
        }
        .program-card:hover .program-btn {
            opacity: 1;
            transform: translateY(0);
        }
        .status-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 3;
            background: rgba(255, 255, 255, 0.95);
            color: var(--brand-text);
            padding: 6px 14px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.8rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            backdrop-filter: blur(5px);
        }
        .focus-scroll-row {
            display: flex;
            flex-wrap: nowrap;
            gap: 1.25rem;
            overflow-x: auto;
            overflow-y: hidden;
            padding: 0.25rem 0.25rem 1rem;
            scrollbar-width: thin;
            -webkit-overflow-scrolling: touch;
            scroll-snap-type: x proximity;
        }
        .focus-scroll-row::-webkit-scrollbar {
            height: 8px;
        }
        .focus-scroll-row::-webkit-scrollbar-thumb {
            background: rgba(18, 43, 107, 0.35);
            border-radius: 999px;
        }
        .focus-scroll-item {
            flex: 0 0 clamp(260px, 32vw, 390px);
            max-width: none;
            padding: 0;
            scroll-snap-align: start;
        }
        .focus-scroll-item .program-card {
            min-height: 380px;
        }
        @media (max-width: 767.98px) {
            .focus-scroll-item {
                flex-basis: min(86vw, 340px);
            }
        }
    </style>
    
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center pt-3">
                <div class="d-flex justify-content-center mt-4">
                    <div style="width: 60px; height: 4px; background: var(--brand-navy); border-radius: 2px;"></div>
                </div>
                <h2 class="fw-bold mt-3 mb-0" style="color: var(--brand-navy); letter-spacing: -0.5px;">Focus Area</h2>
            </div>
        </div>

        <div class="row g-4 focus-scroll-row">
            @foreach($focusAreas as $area)
            <div class="col-lg-4 col-md-6 focus-scroll-item" data-aos="fade-up">
                <div class="program-card h-100">
                    <span class="status-badge"><i class="fa-solid fa-circle me-1" style="font-size: 0.6rem;"></i>Active</span>
                    @if($area->image_path)
                        <img src="{{ asset('storage/' . $area->image_path) }}" alt="{{ $area->title }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 220px;">
                            <i class="fa-solid fa-folder-open fa-3x text-muted opacity-25"></i>
                        </div>
                    @endif
                    <div class="program-card-content">
                        <h4 class="program-title">{{ $area->title }}</h4>
                        <p class="program-desc">{{ $area->description }}</p>
                        <a href="{{ route('focus.area.detail', $area->id) }}" class="program-btn mt-2">Learn More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    </div>
                    <a href="{{ route('focus.area.detail', $area->id) }}" class="position-absolute top-0 start-0 w-100 h-100 z-1"></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- End of Focus Area --}}

{{-- Ongoing Project --}}
<div class="ornab-soft-section ornab-section ornab-section-tight-top ornab-section-tight-bottom">
    <style>
        .ornab-ongoing-card {
            border-radius: 1.25rem;
            border: 1px solid var(--brand-border);
            box-shadow: 0 8px 18px rgba(18, 43, 107, 0.06);
            overflow: hidden;
        }
        .ornab-ongoing-card.is-mint {
            background: linear-gradient(180deg, rgba(79, 168, 201, 0.10) 0%, rgba(255, 255, 255, 0.92) 70%);
        }
        .ornab-ongoing-card.is-sand {
            background: linear-gradient(180deg, rgba(242, 169, 126, 0.12) 0%, rgba(255, 255, 255, 0.92) 70%);
        }
        .ornab-ongoing-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
        }
        .ornab-ongoing-readmore {
            color: var(--brand-teal);
            text-decoration: none;
            font-weight: 700;
        }
        .ornab-ongoing-readmore:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="pb-2 text-center">
            <h3 class="text-center mt-3" style="color: var(--brand-navy);">Ongoing <span>Projects</span></h3>
            <p class="text-center text-secondary mb-5">Ornab Coxs Bazar's ongoing projects actively address community needs, fostering sustainable development in Cox's Bazar.</p>
        </div>

        <div class="row g-4">
            @foreach ($project as $key => $item)
                @if($key < 4)
                @php($bgClass = $key % 2 === 0 ? 'is-mint' : 'is-sand')
                <div class="col-lg-4 col-md-6 {{ $key == 3 ? 'd-lg-none' : '' }}">
                    <div class="ornab-ongoing-card ornab-card-hover {{ $bgClass }} p-4 h-100 d-flex flex-column">
                                <div class="d-flex gap-3 align-items-start">
                                    @if(!empty($item->image))
                                        <div class="ornab-ongoing-icon shadow-sm" style="width:56px;height:56px;border-radius:12px;overflow:hidden;flex:0 0 auto;">
                                            <img src="{{ asset('images/project/'.$item->image) }}" alt="{{ $item->title ?? $item->project_name ?? 'Project' }}" style="width:100%;height:100%;object-fit:cover;display:block;">
                                        </div>
                                    @else
                                        <div class="ornab-ongoing-icon bg-success text-white shadow-sm">
                                            <i class="fa-regular fa-folder-open"></i>
                                        </div>
                                    @endif

                                    <div class="flex-grow-1">
                                        <h5 class="mb-1" style="font-weight: 800; letter-spacing: -0.2px;">
                                            {{ Str::limit($item->project_name ?? $item->title ?? '', 32, '...') }}
                                        </h5>
                                        <div class="small text-secondary fw-bold" style="opacity: 0.9;">
                                            @if(!empty($item->project_duration) || !empty($item->duration) || !empty($item->start_year))
                                                <i class="fa-regular fa-clock"></i> Duration: {{ $item->project_duration ?? $item->duration ?? (($item->start_year ?? '') . ' - ' . ($item->end_year ?? 'Present')) }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                        <div class="pt-3">
                            <p class="mb-0" style="color: var(--ornab-muted); line-height: 1.65;">
                                {{ Str::limit($item->objectives, 120, '...') }}
                            </p>
                        </div>

                        <div class="mt-auto pt-3">
                            <a href="{{ route('ongoing.project.view', $item->id) }}" class="ornab-ongoing-readmore d-inline-flex align-items-center gap-2">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <div class="d-flex justify-content-center pt-3">
            <a href="{{ route('ongoing.project') }}" class="btn btn-outline-success ornab-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                View All Projects <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>



{{-- Latest News and Events --}}
<div class="ornab-soft-section ornab-section ornab-section-tight-top">
    <style>
        .ornab-news-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: rgba(18, 43, 107, 0.10);
            color: var(--brand-navy);
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .ornab-news-subtitle {
            max-width: 820px;
            margin: 0 auto;
            color: var(--ornab-muted);
            line-height: 1.7;
            font-size: 0.95rem;
        }
        .ornab-news-card {
            border-radius: 14px;
            background-color: #ffffff;
            border: 1px solid var(--ornab-card-border);
            box-shadow: var(--ornab-card-shadow);
        }

        .ornab-news-thumb {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            background: rgba(16, 42, 67, 0.06);
            aspect-ratio: 16 / 9;
        }
        .ornab-news-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 260ms ease;
        }
        .ornab-news-card:hover .ornab-news-thumb img {
            transform: scale(1.04);
        }
        .ornab-news-badge {
            background-color: rgba(18, 43, 107, 0.08);
            color: var(--brand-navy);
            border: 1px solid rgba(18, 43, 107, 0.15);
            font-weight: 700;
        }
        .ornab-news-title {
            font-weight: 800;
            letter-spacing: -0.25px;
        }
        .ornab-news-link {
            color: var(--brand-teal);
            text-decoration: none;
            font-weight: 700;
        }
        .ornab-news-link:hover {
            text-decoration: underline;
        }

        .ornab-hscroll-wrap {
            position: relative;
        }
        .ornab-hscroll {
            display: flex;
            gap: 1.25rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding: 0 34px;
        }
        .ornab-hscroll::-webkit-scrollbar { display: none; }
        .ornab-hscroll { -ms-overflow-style: none; scrollbar-width: none; }

        .ornab-hscroll-item {
            flex: 0 0 auto;
            width: 320px;
            scroll-snap-align: start;
        }
        @@media (max-width: 575.98px) {
            .ornab-hscroll {
                padding: 0 22px;
            }
            .ornab-hscroll-item {
                width: 280px;
            }
        }

        .ornab-hscroll-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 36px;
            height: 36px;
            border-radius: 999px;
            border: 1px solid rgba(18, 43, 107, 0.25);
            background: #fff;
            color: var(--brand-navy);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--ornab-card-shadow);
            z-index: 2;
        }
        .ornab-hscroll-nav:hover {
            border-color: rgba(18, 43, 107, 0.45);
        }
        .ornab-hscroll-nav.is-prev { left: 8px; }
        .ornab-hscroll-nav.is-next { right: 8px; }

        .ornab-hscroll-track {
            height: 10px;
            background: rgba(18, 43, 107, 0.10);
            border-radius: 999px;
            position: relative;
            max-width: none;
            margin: 16px 34px 0;
        }
        @@media (max-width: 575.98px) {
            .ornab-hscroll-track {
                margin: 14px 22px 0;
            }
        }
        .ornab-hscroll-indicator {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            border-radius: 999px;
            background: var(--brand-navy);
            width: 120px;
        }
    </style>

    <div class="container">
        <div class="text-center mb-3">
            <div class="mb-2">
                <span class="ornab-news-pill">Stay informed</span>
            </div>
            <h2 class="ornab-sponsor-title mb-2" style="color: var(--brand-navy);">Latest News &amp; Events</h2>
            <p class="ornab-news-subtitle mb-0">
                Stay connected with our latest stories, announcements, and community impact updates from Cox's Bazar.
            </p>
        </div>

        <div class="ornab-hscroll-wrap">
            <button type="button" class="ornab-hscroll-nav is-prev" aria-label="Scroll news left" data-hscroll-prev="ornabNewsScroll">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div id="ornabNewsScroll" class="ornab-hscroll">
                @foreach ($news as $key => $data)
                    <div class="ornab-hscroll-item">
                        <div class="ornab-news-card ornab-card-hover p-4 h-100 d-flex flex-column">
                            <div class="ornab-news-thumb mb-3">
                                <img
                                    src="{{ !empty($data->image) ? asset('images/news/'.$data->image) : asset('img/mission.jpg') }}"
                                    alt="{{ $data->title ?? 'News image' }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='{{ asset('img/mission.jpg') }}';"
                                >
                            </div>

                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <span class="badge rounded-pill ornab-news-badge">
                                    {{ (property_exists($data, 'category') && !empty($data->category)) ? $data->category : 'News' }}
                                </span>
                                <div class="small text-secondary" style="white-space: nowrap;">
                                    <i class="fa-regular fa-calendar"></i>
                                    {{ !empty($data->news_date) ? \Carbon\Carbon::parse($data->news_date)->format('d M Y') : date('d M Y', strtotime((property_exists($data, 'created_at') && !empty($data->created_at)) ? $data->created_at : now())) }}
                                </div>
                            </div>

                            <h5 class="ornab-news-title mb-2">{{ Str::limit($data->title ?? '', 55, '...') }}</h5>
                            <p class="mb-0" style="color: var(--ornab-muted); line-height: 1.65;">
                                {{ Str::limit(strip_tags($data->description ?? ''), 120, '...') }}
                            </p>

                            <div class="mt-auto pt-3">
                                <a href="{{ route('latest.news.view', $data->id) }}" class="ornab-news-link d-inline-flex align-items-center gap-2">
                                    Read More <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="ornab-hscroll-nav is-next" aria-label="Scroll news right" data-hscroll-next="ornabNewsScroll">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <div class="ornab-hscroll-track" aria-hidden="true" data-hscroll-track-for="ornabNewsScroll">
                <div class="ornab-hscroll-indicator" data-hscroll-indicator-for="ornabNewsScroll"></div>
            </div>
        </div>

        <div class="d-flex justify-content-center pt-4">
            <a href="{{ route('latest.news.all') }}" class="btn btn-outline-success ornab-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                View All News &amp; Events <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- End of Latest News and Events --}}

{{-- Sponsor (moved below Latest News & Events, redesigned) --}}
<div class="ornab-sponsor-wrap">
    <style>
        .ornab-sponsor-card {
            background: linear-gradient(135deg, #122B6B, #1a3f8a);
            border-radius: 22px;
             padding: 2rem 1.5rem;
            color: #fff;
            box-shadow: 0 18px 45px rgba(18,43,107,.22);
            max-width: 940px;
            margin: 0 auto;
        }
        .ornab-sponsor-icon {
            width: 66px; height: 66px; border-radius: 18px;
            display: inline-flex; align-items: center; justify-content: center;
            background: rgba(255,255,255,.18); color: #fff; font-size: 1.6rem;
            margin-bottom: 1.3rem;
        }
        .ornab-sponsor-title { font-weight: 800; letter-spacing: -.5px; }
        .ornab-sponsor-desc { color: rgba(255,255,255,.92); max-width: 760px; margin: 0 auto 1.6rem; line-height: 1.8; }
        .ornab-sponsor-btn {
            background: #fff; color: var(--brand-navy); border: none; font-weight: 600;
        }
        .ornab-sponsor-btn:hover { background: var(--brand-bg); color: var(--brand-navy); }
        .ornab-sponsor-btn-outline {
            background: transparent; color: #fff; border: 2px solid rgba(255,255,255,.5); font-weight: 600;
        }
        .ornab-sponsor-btn-outline:hover { background: rgba(255,255,255,.12); color: #fff; }
    </style>
    <div class="ornab-section pt-4 pb-4">
        <div class="container">
            <div class="ornab-sponsor-card text-center">
                <div class="ornab-sponsor-icon"><i class="fa-regular fa-heart fs-4"></i></div>
                <h2 class="ornab-sponsor-title mb-3" style="color: #ffffff;">Sponsor for a Growing Fund</h2>
                <p class="ornab-sponsor-desc mb-4">
                    Sponsor Ornab Coxs Bazar's growing fund to fuel impactful initiatives in Cox's Bazar. Your support drives essential programs in healthcare, education,
                    and community resilience — making a lasting difference in lives.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('contact') }}" class="btn ornab-btn-pill ornab-sponsor-btn d-inline-flex align-items-center gap-2">
                        <i class="fa-regular fa-heart"></i> Become a Sponsor
                    </a>
                    <a href="{{ route('frontend.projects') }}" class="btn ornab-btn-pill ornab-sponsor-btn-outline d-inline-flex align-items-center gap-2">
                        Learn About Our Project <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Sponsor --}}




{{-- Photo Gallery --}}
<div class="ornab-soft-section ornab-section pt-4 pb-4">
    <style>
        .ornab-gallery-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 10px;
            border-radius: 999px;
            background-color: rgba(242, 169, 126, 0.14);
            color: var(--brand-coral);
            font-weight: 800;
            letter-spacing: 0.5px;
            font-size: 0.65rem;
            text-transform: uppercase;
        }
        .ornab-gallery-subtitle {
            max-width: 820px;
            margin: 0 auto;
            color: var(--ornab-muted);
            line-height: 1.7;
            font-size: 0.95rem;
        }
        .ornab-gallery-card {
            border-radius: 16px;
            overflow: hidden;
            background-color: #fff;
            border: 1px solid var(--brand-border);
            box-shadow: 0 10px 24px rgba(18, 43, 107, 0.06);
        }
        .ornab-gallery-cover {
            width: 100%;
            height: 210px;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        .ornab-gallery-album-title {
            font-weight: 800;
            letter-spacing: -0.2px;
        }
        .ornab-gallery-meta {
            font-size: 12px;
            color: var(--ornab-muted);
        }
        .ornab-gallery-more {
            color: var(--brand-teal);
            font-weight: 700;
            text-decoration: none;
        }
        .ornab-gallery-more:hover {
            text-decoration: underline;
        }

        .ornab-gallery-scroll .ornab-hscroll-item {
            width: 270px;
        }
        @@media (max-width: 575.98px) {
            .ornab-gallery-scroll .ornab-hscroll-item {
                width: 240px;
            }
        }
    </style>

    <div class="container">
        <div class="text-center mb-3">
            <div class="mb-2">
                <span class="ornab-gallery-pill">Photo gallery</span>
            </div>
            <h2 class="ornab-sponsor-title mb-2" style="color: var(--brand-navy);">Photo Gallery</h2>
            <p class="ornab-gallery-subtitle mb-0">
                Explore moments from Ornab Coxs Bazar's field activities, community programs, and events across Cox's Bazar.
            </p>
        </div>

    

        <div class="ornab-hscroll-wrap ornab-gallery-scroll">
            <button type="button" class="ornab-hscroll-nav is-prev" aria-label="Scroll gallery left" data-hscroll-prev="ornabGalleryScroll">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div id="ornabGalleryScroll" class="ornab-hscroll">
                @foreach (($albumsPreview ?? []) as $album)
                    <div class="ornab-hscroll-item">
                        <a href="{{ route('gallery.album', ['album' => $album->name]) }}" class="text-decoration-none text-dark">
                            <div class="ornab-gallery-card ornab-card-hover h-100">
                                <img src="{{ asset('images/gallery/'.($album->cover_image ?? '')) }}" class="ornab-gallery-cover" alt="{{ $album->name }}">
                                <div class="p-3">
                                    <div class="d-flex align-items-start justify-content-between gap-3">
                                        <div class="ornab-gallery-album-title">{{ $album->name }}</div>
                                        <div class="ornab-gallery-meta" style="white-space: nowrap;">
                                            <i class="fa-regular fa-images"></i> {{ $album->photo_count }} Photos
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <button type="button" class="ornab-hscroll-nav is-next" aria-label="Scroll gallery right" data-hscroll-next="ornabGalleryScroll">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <div class="ornab-hscroll-track" aria-hidden="true" data-hscroll-track-for="ornabGalleryScroll">
                <div class="ornab-hscroll-indicator" data-hscroll-indicator-for="ornabGalleryScroll"></div>
            </div>
        </div>

        <div class="d-flex justify-content-center pt-3">
            <a href="{{ route('photo.all') }}" class="btn btn-outline-success ornab-btn-pill d-inline-flex align-items-center gap-2" style="border-width: 2px;">
                All Photos <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- End of Photo Gallery --}}


{{-- Donors & Partners --}}
<div class="ornab-section pt-4" style="background-color: var(--brand-bg);">
    <style>
        .ornab-partner-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            border-radius: 999px;
            background-color: rgba(242, 169, 126, 0.14);
            color: var(--brand-coral);
            font-weight: 900;
            letter-spacing: 0.9px;
            font-size: 0.7rem;
            text-transform: uppercase;
        }
        .ornab-partner-subtitle {
            max-width: 820px;
            margin: 0 auto;
            color: var(--ornab-muted);
            line-height: 1.7;
            font-size: 0.98rem;
        }

        .ornab-partner-scroll .ornab-hscroll-item {
            width: 220px;
        }
        .ornab-partner-scroll .ornab-hscroll {
            overflow: hidden;
        }
        .ornab-partner-scroll .ornab-partner-track {
            display: flex;
            gap: 16px;
            width: max-content;
            animation: ornabPartnerScroll 35s linear infinite;
        }
        .ornab-partner-scroll:hover .ornab-partner-track {
            animation-play-state: paused;
        }
        .ornab-partner-scroll .ornab-hscroll-item {
            flex: 0 0 auto;
        }
        @keyframes ornabPartnerScroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        @media (max-width: 575.98px) {
            .ornab-partner-scroll .ornab-hscroll-item {
                width: 200px;
            }
            .ornab-partner-scroll .ornab-partner-track {
                animation-duration: 50s;
            }
        }

        .ornab-partner-card {
            border-radius: 18px;
            background: #fff;
            border: 1px solid var(--brand-border);
            box-shadow: var(--ornab-card-shadow);
            padding: 18px 16px;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-align: center;
        }

        .ornab-partner-logo {
            height: 44px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .ornab-partner-logo img {
            max-height: 44px;
            max-width: 140px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .ornab-partner-mark {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(18, 43, 107, 0.15);
            color: var(--brand-navy);
            font-weight: 900;
            letter-spacing: -0.4px;
            background: rgba(18, 43, 107, 0.06);
        }

        .ornab-partner-name {
            font-weight: 800;
            color: #111827;
            line-height: 1.2;
        }
    </style>

    <div class="container">
        <div class="text-center mb-3">
            <div class="mb-2">
                <span class="ornab-partner-pill">Trusted by</span>
            </div>
            <h2 class="ornab-sponsor-title mb-2" style="color: var(--brand-navy);">Donors &amp; Partners</h2>
            <p class="ornab-partner-subtitle mb-0">
                Trusted by leading organizations worldwide — together, we amplify our impact.
            </p>
        </div>

        <?php if (isset($partners) && count($partners) > 0) { ?>
        <div class="ornab-hscroll-wrap ornab-partner-scroll">
            <button type="button" class="ornab-hscroll-nav is-prev" aria-label="Scroll partners left" data-hscroll-prev="ornabPartnersScroll">
                <i class="fa-solid fa-chevron-left"></i>
            </button>

            <div id="ornabPartnersScroll" class="ornab-hscroll">
                <div class="ornab-partner-track">
                    <?php foreach ($partners as $partner) { ?>
                    <?php
                        $partnerName = $partner->name ?? '';
                    $words = preg_split('/\s+/', trim($partnerName));
                    $initials = '';
                    foreach (array_filter($words) as $w) {
                        $initials .= mb_strtoupper(mb_substr($w, 0, 1));
                        if (mb_strlen($initials) >= 2) {
                            break;
                        }
                    }
                    if ($initials === '') {
                        $initials = 'UE';
                    }
                    ?>

                    <div class="ornab-hscroll-item">
                        <div class="ornab-partner-card ornab-card-hover">
                            <?php if (! empty($partner->logo)) { ?>
                                <div class="ornab-partner-logo">
                                    <img
                                        src="<?php echo e(asset('images/partner/'.$partner->logo)); ?>"
                                        alt="<?php echo e($partnerName); ?>"
                                        loading="lazy"
                                        onerror="this.onerror=null;this.closest('.ornab-partner-logo').style.display='none';"
                                    >
                                </div>
                            <?php } else { ?>
                                <div class="ornab-partner-mark"><?php echo e($initials); ?></div>
                            <?php } ?>

                            <div class="ornab-partner-name"><?php echo e($partnerName); ?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <button type="button" class="ornab-hscroll-nav is-next" aria-label="Scroll partners right" data-hscroll-next="ornabPartnersScroll">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <div class="ornab-hscroll-track" aria-hidden="true" data-hscroll-track-for="ornabPartnersScroll">
                <div class="ornab-hscroll-indicator" data-hscroll-indicator-for="ornabPartnersScroll"></div>
            </div>
        </div>
        <?php } else { ?>
        <p class="text-center text-muted py-4">No partners listed yet.</p>
        <?php } ?>
    </div>
</div>

{{-- End of Donors & Partners --}}

{{-- subscription part --}}
<div class="bg-light pt-4 pb-4">
    <div class="container bg-white pb-4 rounded">
        <div class="py-4">
            <h3 class="text-center" style="color: var(--brand-navy);"><span>Stay</span> connected <span> with us</span></h3>
            <p class="text-center text-secondary">Keep in touch with our activities throughout the world by subscribing to our e-newsletter.</p>
        </div>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success w-75 mx-auto text-center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form action="{{ route('user.subscribe') }}" method="post">
                @csrf
                @if(config('recaptcha.enabled'))
                    <div class="mb-3 text-center">
                        {!! NoCaptcha::display() !!}
                        @if($errors->has('g-recaptcha-response'))
                            <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>
                @endif
                <div class="d-flex justify-content-center">
                    <div class="w-75 mx-auto">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Your Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 my-2">
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Your Email" value="{{ old('email') }}">
                                 @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-block btn-danger my-2" type="submit">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- end of subscription part --}}
@endsection

@push('js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carouselEl = document.getElementById('carouselExampleIndicators');
        if (!carouselEl) return;

        let activeTimeouts = [];
        const prefersReducedMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function clearTypingTimers() {
            activeTimeouts.forEach((t) => clearTimeout(t));
            activeTimeouts = [];
            // Remove cursor from all typewriter elements to ensure no stuck cursors
            document.querySelectorAll('.js-typewriter').forEach(el => el.classList.remove('typewriter-cursor'));
        }

        function typeInto(el, text, speed) {
            el.textContent = '';
            // Ensure cursor is visible while typing
            el.classList.add('typewriter-cursor');
            
            let i = 0;

            const tick = () => {
                if (i > text.length) {
                    // Typing finished, remove cursor
                    el.classList.remove('typewriter-cursor');
                    return;
                }
                el.textContent = text.slice(0, i);
                i++;
                const timer = setTimeout(tick, speed);
                activeTimeouts.push(timer);
            };

            tick();
        }

        function runTypewriterForActiveSlide() {
            clearTypingTimers();

            const activeItem = carouselEl.querySelector('.carousel-item.active');
            if (!activeItem) return;

            const titleEl = activeItem.querySelector('.hero-title-text');
            const descEl = activeItem.querySelector('.hero-desc-text');

            const isBangla = document.cookie.split('; ').some(row => row.startsWith('googtrans=') && row.includes('/en/bn'));

            const titleText = titleEl ? (isBangla ? (titleEl.getAttribute('data-text-bn') || titleEl.getAttribute('data-text') || titleEl.textContent || '') : (titleEl.getAttribute('data-text') || titleEl.textContent || '')) : '';
            const descText = descEl ? (isBangla ? (descEl.getAttribute('data-text-bn') || descEl.getAttribute('data-text') || descEl.textContent || '') : (descEl.getAttribute('data-text') || descEl.textContent || '')) : '';

            if (prefersReducedMotion) {
                if (titleEl) titleEl.textContent = titleText;
                if (descEl) descEl.textContent = descText;
                return;
            }

            if (titleEl) {
                activeTimeouts.push(setTimeout(() => typeInto(titleEl, titleText, 28), 150));
            }
            if (descEl) {
                activeTimeouts.push(setTimeout(() => typeInto(descEl, descText, 14), 900));
            }
        }

        runTypewriterForActiveSlide();
        carouselEl.addEventListener('slid.bs.carousel', runTypewriterForActiveSlide);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function initHScroll(scrollId) {
            const scroller = document.getElementById(scrollId);
            if (!scroller) return;

            const prevBtn = document.querySelector('[data-hscroll-prev="' + scrollId + '"]');
            const nextBtn = document.querySelector('[data-hscroll-next="' + scrollId + '"]');
            const track = document.querySelector('[data-hscroll-track-for="' + scrollId + '"]');
            const indicator = document.querySelector('[data-hscroll-indicator-for="' + scrollId + '"]');

            function updateUI() {
                const maxScroll = scroller.scrollWidth - scroller.clientWidth;
                const hasOverflow = maxScroll > 2;

                if (prevBtn) prevBtn.style.display = hasOverflow ? '' : 'none';
                if (nextBtn) nextBtn.style.display = hasOverflow ? '' : 'none';
                if (track) track.style.display = hasOverflow ? '' : 'none';

                if (!indicator || !track) return;
                if (!hasOverflow) {
                    indicator.style.left = '0px';
                    indicator.style.width = track.clientWidth + 'px';
                    return;
                }

                const trackWidth = track.clientWidth;
                const visibleFraction = scroller.clientWidth / scroller.scrollWidth;
                const indicatorWidth = Math.max(44, Math.floor(trackWidth * visibleFraction));
                const maxLeft = Math.max(0, trackWidth - indicatorWidth);
                const left = Math.min(maxLeft, Math.max(0, (scroller.scrollLeft / maxScroll) * maxLeft));

                indicator.style.width = indicatorWidth + 'px';
                indicator.style.left = left + 'px';
            }

            function scrollByAmount(direction) {
                const amount = Math.max(260, Math.floor(scroller.clientWidth * 0.86));
                scroller.scrollBy({ left: direction * amount, behavior: 'smooth' });
            }

            if (prevBtn) prevBtn.addEventListener('click', () => scrollByAmount(-1));
            if (nextBtn) nextBtn.addEventListener('click', () => scrollByAmount(1));

            scroller.addEventListener('scroll', updateUI, { passive: true });
            window.addEventListener('resize', updateUI);
            updateUI();
        }

        initHScroll('ornabNewsScroll');
        initHScroll('ornabGalleryScroll');
        initHScroll('ornabPartnersScroll');

        const partnerTrack = document.querySelector('.ornab-partner-track');
        if (partnerTrack) {
            const items = partnerTrack.innerHTML;
            partnerTrack.innerHTML = items + items;
        }
    });
</script>

@endpush

