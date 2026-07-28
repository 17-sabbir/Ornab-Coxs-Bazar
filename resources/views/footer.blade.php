{{-- ============================================================
    Premium NGO Footer — Ornab Cox's Bazar
    Design: Dark green gradient, clean NGO layout, responsive
    ============================================================ --}}
<div class="ornab-footer-wrapper">
    <style>
        /* ===== GLOBAL ===== */
        .ornab-footer-wrapper {
            font-family: 'DM Sans', sans-serif;
        }

        /* ===== MAIN BACKGROUND ===== */
        .ornab-footer-main {
            background: linear-gradient(160deg, #062F2A 0%, #0A3D36 50%, #0E4C42 100%);
            color: rgba(255, 255, 255, 0.75);
            position: relative;
            overflow: hidden;
        }
        /* Subtle radial glow */
        .ornab-footer-main::before {
            content: '';
            position: absolute;
            top: -120px;
            right: -80px;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .ornab-footer-main::after {
            content: '';
            position: absolute;
            bottom: -100px;
            left: -60px;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(249,116,21,0.06) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ===== COLUMN HEADINGS ===== */
        .ornab-heading {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: 0.3px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            position: relative;
        }
        .ornab-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 34px;
            height: 3px;
            background: var(--brand-orange, #F97415);
            border-radius: 4px;
        }

        /* ===== BRAND COLUMN ===== */
        .ornab-brand-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 16px;
        }
        .ornab-logo-box {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            background: #ffffff;
            flex-shrink: 0;
            box-shadow: 0 4px 18px rgba(0,0,0,0.25);
            border: 2px solid rgba(255,255,255,0.12);
        }
        .ornab-logo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .ornab-brand-name {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            line-height: 1.2;
        }
        .ornab-brand-tagline {
            font-size: 0.78rem;
            color: rgba(255,255,255,0.5);
            font-weight: 400;
            letter-spacing: 0.3px;
        }
        .ornab-desc {
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            line-height: 1.8;
            max-width: 380px;
            margin-bottom: 20px;
        }

        /* ===== SOCIAL ICONS (CIRCULAR) ===== */
        .ornab-social-wrap {
            display: flex;
            gap: 10px;
        }
        .ornab-social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.10);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .ornab-social-link:hover {
            background: var(--brand-orange, #F97415);
            border-color: var(--brand-orange, #F97415);
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(249,116,21,0.30);
        }

        /* ===== QUICK LINKS ===== */
        .ornab-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .ornab-links li {
            margin-bottom: 4px;
        }
        .ornab-links a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            display: inline-block;
            padding: 5px 0;
            transition: all 0.3s ease;
            position: relative;
        }
        .ornab-links a:hover {
            color: var(--brand-orange, #F97415);
            padding-left: 6px;
        }

        /* ===== FAQ ITEMS ===== */
        .ornab-faq-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .ornab-faq-item:last-child {
            border-bottom: none;
        }
        .ornab-faq-icon {
            width: 28px;
            height: 28px;
            min-width: 28px;
            border-radius: 50%;
            background: rgba(249,116,21,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange, #F97415);
            font-size: 0.75rem;
            flex-shrink: 0;
            margin-top: 2px;
        }
        .ornab-faq-text {
            color: rgba(255,255,255,0.6);
            font-size: 0.88rem;
            line-height: 1.5;
        }
        .ornab-faq-text a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .ornab-faq-text a:hover {
            color: var(--brand-orange, #F97415);
        }

        /* ===== CONTACT ITEMS ===== */
        .ornab-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 8px 0;
            color: rgba(255,255,255,0.65);
            font-size: 0.9rem;
            line-height: 1.6;
        }
        .ornab-contact-icon {
            width: 34px;
            height: 34px;
            min-width: 34px;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-orange, #F97415);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .ornab-contact-item:hover .ornab-contact-icon {
            background: var(--brand-orange, #F97415);
            color: #ffffff;
        }

        /* ===== BOTTOM BAR ===== */
        .ornab-footer-bottom {
            background: #042520;
            border-top: 1px solid rgba(255,255,255,0.05);
            padding: 18px 0;
        }
        .ornab-bottom-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .ornab-bottom-text {
            color: rgba(255,255,255,0.45);
            font-size: 0.82rem;
            font-family: 'DM Sans', sans-serif;
            letter-spacing: 0.2px;
        }
        .ornab-bottom-divider {
            color: rgba(255,255,255,0.2);
            margin: 0 6px;
        }
        .ornab-bottom-links a {
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            font-size: 0.82rem;
            transition: color 0.3s ease;
        }
        .ornab-bottom-links a:hover {
            color: var(--brand-orange, #F97415);
        }

        /* ===== BACK TO TOP ===== */
        .ornab-back-top {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 99;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--brand-orange, #F97415);
            border: none;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.05rem;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(249,116,21,0.35);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .ornab-back-top:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 28px rgba(249,116,21,0.45);
            color: #ffffff;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 767px) {
            .ornab-bottom-row {
                flex-direction: column;
                text-align: center;
            }
            .ornab-heading {
                margin-top: 14px;
            }
        }
    </style>

    {{-- ===== MAIN FOOTER CONTENT ===== --}}
    <div class="ornab-footer-main">
        <div class="container px-3 py-5 position-relative" style="z-index: 1;">
            <div class="row g-4">

                {{-- COLUMN 1: Brand --}}
                <div class="col-lg-4">
                    @php $appSettings = application(); @endphp
                    <div class="ornab-brand-wrap">
                        <div class="ornab-logo-box">
                            <img src="{{ $appSettings && !empty($appSettings->main_logo) ? asset('images/application/'.$appSettings->main_logo) : asset('images/application/ornab-logo.png') }}" alt="Ornab Coxs Bazar">
                        </div>
                        <div>
                            <div class="ornab-brand-name">{{ $appSettings->site_name ?? 'Ornab Cox\'s Bazar' }}</div>
                            <div class="ornab-brand-tagline">Non-profit Organization</div>
                        </div>
                    </div>

                    <p class="ornab-desc">
                        {{ $appSettings->footer_text ?? 'Ornab Cox\'s Bazar — Empowering communities and creating sustainable change in Bangladesh since 2008.' }}
                    </p>

                    <div class="ornab-social-wrap mb-2">
                        <a class="ornab-social-link" href="{{ application()->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a class="ornab-social-link" href="{{ application()->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a class="ornab-social-link" href="{{ application()->youtube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        <a class="ornab-social-link" href="{{ application()->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>

                {{-- COLUMN 2: Quick Links --}}
                <div class="col-lg-2 col-md-4">
                    <div class="ornab-heading">{{ 'Quick Links' }}</div>
                    <ul class="ornab-links">
                        <li><a href="{{ route('about.us') }}">{{ 'About us' }}</a></li>
                        <li><a href="{{ route('ongoing.project') }}">{{ 'Projects' }}</a></li>
                        <li><a href="{{ route('latest.news.all') }}">{{ 'Media Center' }}</a></li>
                        <li><a href="{{ route('gallery.albums') }}">{{ 'Gallery' }}</a></li>
                    </ul>
                </div>

                {{-- COLUMN 3: FAQ --}}
                <div class="col-lg-3 col-md-4">
                    <div class="ornab-heading">{{ 'FAQ' }}</div>
                    @php
                        $footerFaqs = DB::table('faq')->orderBy('order', 'asc')->limit(3)->get();
                    @endphp
                    @if(isset($footerFaqs) && count($footerFaqs) > 0)
                        @foreach($footerFaqs as $f)
                            <div class="ornab-faq-item">
                                <div class="ornab-faq-icon"><i class="fa-solid fa-question"></i></div>
                                <div class="ornab-faq-text">
                                    <a href="{{ route('faq') }}">{{ \Illuminate\Support\Str::limit($f->question, 45) }}</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="ornab-faq-item">
                            <div class="ornab-faq-icon"><i class="fa-solid fa-question"></i></div>
                            <div class="ornab-faq-text"><a href="{{ route('faq') }}">{{ 'View FAQs' }}</a></div>
                        </div>
                    @endif
                </div>

                {{-- COLUMN 4: Contact --}}
                <div class="col-lg-3 col-md-4">
                    <div class="ornab-heading">{{ 'Contact Us' }}</div>
                    @php $headOffice = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first(); @endphp

                    <div class="ornab-contact-item">
                        <div class="ornab-contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <div>{{ $headOffice->address ?? 'Head Office Address Not Set' }}</div>
                    </div>
                    <div class="ornab-contact-item">
                        <div class="ornab-contact-icon"><i class="fa-solid fa-phone"></i></div>
                        <div><a href="tel:{{ $headOffice->mobile ?? '' }}" style="color:inherit;text-decoration:none;">{{ $headOffice->mobile ?? '' }}</a></div>
                    </div>
                    <div class="ornab-contact-item">
                        <div class="ornab-contact-icon"><i class="fa-regular fa-envelope"></i></div>
                        <div><a href="mailto:{{ $headOffice->email ?? '' }}" style="color:inherit;text-decoration:none;">{{ $headOffice->email ?? '' }}</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ===== BACK TO TOP ===== --}}
    <a href="#" class="ornab-back-top" onclick="window.scrollTo({top:0,behavior:'smooth'});return false;">
        <i class="fa fa-arrow-up" aria-hidden="true"></i>
    </a>

    {{-- ===== BOTTOM COPYRIGHT BAR ===== --}}
    <div class="ornab-footer-bottom">
        <div class="container">
            <div class="ornab-bottom-row">
                <small class="ornab-bottom-text">
                    Thank you for being with us in our journey of creating positive change.
                </small>
                <small class="ornab-bottom-text">
                    {{ $appSettings->copyright_text ?? '© ' . date('Y') . ' Ornab Cox\'s Bazar. All rights reserved.' }}
                </small>
                <div class="ornab-bottom-links">
                    <a href="#">Privacy Policy</a>
                    <span class="ornab-bottom-divider">|</span>
                    <a href="#">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </div>
</div>