{{-- Footer started --}}
<div class="uerd-footer" style="border-top: 1px solid rgba(249, 116, 21, 0.3);">
    <style>
        .uerd-footer {
            background: linear-gradient(180deg, #131920 0%, #0B0F13 100%); /* Brand Ink Dark Gradient */
            color: #F8FAFC;
        }
        .uerd-footer a { 
            color: rgba(255, 255, 255, 0.7); 
            transition: all 0.3s ease;
            font-family: 'DM Sans', sans-serif;
        }
        .uerd-footer a:hover { 
            color: var(--brand-orange); 
            padding-left: 5px; /* Slight movement */
        }
        .uerd-footer-heading {
            color: #ffffff;
            font-weight: 700;
            font-family: 'Playfair Display', serif;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
            font-size: 1.25rem;
            position: relative;
        }
        .uerd-footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 40px;
            height: 2px;
            background: var(--brand-orange);
            border-radius: 2px;
        }
        .uerd-footer-link {
            display: inline-flex;
            padding: 8px 0;
            text-decoration: none;
            font-size: 0.95rem;
        }
        .uerd-footer-muted { 
            color: rgba(255, 255, 255, 0.6); 
            font-family: 'DM Sans', sans-serif;
        }
        .uerd-footer-brand {
            display: inline-flex;
            align-items: center;
            gap: 16px;
        }
        .uerd-footer-logo {
            width: 56px;
            height: 56px;
            border-radius: 50%; /* Circle */
            background: linear-gradient(135deg, var(--brand-teal), #0d5f49);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 900;
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(21, 131, 104, 0.3);
            border: 2px solid rgba(255,255,255,0.1);
        }
        .uerd-footer-social {
            width: 44px;
            height: 44px;
            border-radius: 50%; /* Circle */
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.10);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .uerd-footer-social:hover {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(249, 116, 21, 0.3);
            padding-left: 0; /* Override generic a:hover padding */
        }
        .uerd-footer-contact {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 10px 0;
            color: rgba(255, 255, 255, 0.75);
            font-family: 'DM Sans', sans-serif;
        }
        .uerd-footer-contact i { 
            color: var(--brand-teal); 
            font-size: 1.1rem;
            margin-top: 4px;
        }
        .uerd-footer-ul { list-style: none; padding: 0; margin: 0; }
        .uerd-footer-bottom {
            background: #0B0F13; /* Darker bottom */
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            font-family: 'DM Sans', sans-serif;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--brand-teal) !important;
            border-color: var(--brand-teal) !important;
        }
    </style>

    <div class="container px-2 py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="uerd-footer-brand mb-3">
                    <div class="uerd-footer-logo" style="padding: 0; overflow: hidden; background: #fff;">
                        @php $appSettings = application(); @endphp
                        <img src="{{ $appSettings && !empty($appSettings->main_logo) ? asset('images/application/'.$appSettings->main_logo) : asset('images/application/ornab-logo.png') }}" alt="Ornab Coxs Bazar" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div>
                        <div class="fw-bold" style="color:#fff; font-size: 1.5rem; line-height: 1.0; font-family: 'Playfair Display', serif;">{{ $appSettings->site_name ?? 'Ornab Cox\'s Bazar' }}</div>
                    </div>
                </div>

                <p class="uerd-footer-muted mb-4" style="max-width: 360px; line-height: 1.8; opacity: 0.8;">
                    {{ $appSettings->footer_text ?? 'Ornab Cox\'s Bazar — Empowering communities and creating sustainable change in Bangladesh since 2008.' }}
                </p>

                <div class="d-flex gap-2">
                    <a class="uerd-footer-social" href="{{ application()->facebook }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->twitter }}" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->youtube }}" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a class="uerd-footer-social" href="{{ application()->instagram }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="uerd-footer-heading">{{ 'Quick Links' }}</div>
                <ul class="uerd-footer-ul">
                    <li><a class="uerd-footer-link" href="{{ route('about.us') }}">{{ 'About us' }}</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('ongoing.project') }}">{{ 'Ongoing Projects' }}</a></li>
                    <li><a class="uerd-footer-link" href="{{ route('latest.news.all') }}">{{ 'Media Center' }}</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="uerd-footer-heading">{{ 'FAQ' }}</div>
                @php
                    $footerFaqs = DB::table('faq')->orderBy('order', 'asc')->limit(4)->get();
                @endphp
                <ul class="uerd-footer-ul">
                    @if(isset($footerFaqs) && count($footerFaqs) > 0)
                        @foreach($footerFaqs as $f)
                            <li><a class="uerd-footer-link" href="{{ route('faq') }}">{{ \Illuminate\Support\Str::limit($f->question, 40) }}</a></li>
                        @endforeach
                    @else
                        <li><a class="uerd-footer-link" href="{{ route('faq') }}">{{ 'View FAQs' }}</a></li>
                    @endif
                </ul>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="uerd-footer-heading">{{ 'Contact Us' }}</div>
                @php $headOffice = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first(); @endphp
                <div class="uerd-footer-contact">
                    <div><i class="fa-solid fa-location-dot"></i></div>
                    <div>{{ $headOffice->address ?? 'Head Office Address Not Set' }}</div>
                </div>
                <div class="uerd-footer-contact">
                    <div><i class="fa-solid fa-phone"></i></div>
                    <div>{{ $headOffice->mobile ?? '' }}</div>
                </div>
                <div class="uerd-footer-contact">
                    <div><i class="fa-regular fa-envelope"></i></div>
                    <div>{{ $headOffice->email ?? '' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="#" class="btn btn-primary shadow back-to-top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i>
</a>

{{-- copyright --}}
<div class="uerd-footer-bottom p-3">
    <div class="container text-white d-flex flex-column flex-md-row justify-content-center align-items-center gap-2 text-center">
        <small>{{ $appSettings->copyright_text ?? 'Copyright © '.date('Y').' || All right reserved by Ornab Cox\'s Bazar' }}</small>
        {{-- <small>Developed By: <span title="Noakhali Science and Technology University">NSTU</span> Software Development Team</small> --}}
    </div>
</div>
