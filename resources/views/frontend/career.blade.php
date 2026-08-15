@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-body-text { color: var(--brand-text) !important; }
.uerd-submit-btn { background: var(--brand-navy); color: #fff; border: none; font-weight: 700; border-radius: 12px; padding: 14px 32px; transition: all .3s ease; }
.uerd-submit-btn:hover { background: var(--brand-teal); color: #fff; }
.uerd-form-control:focus { border-color: var(--brand-teal) !important; box-shadow: 0 0 0 0.25rem rgba(79,168,201,.25) !important; }
</style>

<!-- ======= Career Page Header ======= -->
<div class="container pt-4 pb-3 text-center">
    <h1 class="fw-bold mb-2 uerd-page-title" style="font-size: 2.2rem; font-family: var(--font-heading);">
        Career with Ornab Cox's Bazar
    </h1>
    <p class="mx-auto mt-2 uerd-body-text" style="max-width: 600px; font-size: 0.95rem; line-height: 1.7;">
        Join our team of dedicated professionals working to eliminate poverty and gender discrimination.
    </p>
</div>

<!-- ======= Career Content ======= -->
<section class="pt-2 pb-5">
    <div class="container">
        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-7">
                <div class="pe-lg-4">
                    <!-- About Us (Dynamic) -->
                    <div class="mb-4">
                        <h3 class="fw-bold mb-3 uerd-page-title" style="font-size: 1.3rem; border-left: 4px solid var(--brand-coral); padding-left: 12px;">
                            About Us
                        </h3>
                        <div class="uerd-body-text" style="line-height: 1.85; font-size: 0.95rem; text-align: justify;">
                            {!! $about_us->about_us ?? '<p>Ornab Cox\'s Bazar is a non-government, non-profit, and non-political voluntary social development organization committed to community welfare, resilience, and sustainable development. We work together with disadvantaged communities to create sustainable change.</p>' !!}
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="p-4 rounded-4" style="background: var(--brand-navy); color: #fff;">
                        <h5 class="fw-bold mb-3" style="font-size: 1.05rem;">
                            <i class="fa-regular fa-clock me-2" style="color: #fff;"></i> Office Hours
                        </h5>
                        <ul class="list-unstyled mb-0" style="line-height: 2; font-size: 0.9rem;">
                            <li>
                                <i class="fa-solid fa-check me-2" style="color: #fff;"></i>
                                Saturday to Thursday: 09:00 AM to 05:00 PM
                            </li>
                            <li>
                                <i class="fa-solid fa-minus me-2" style="color: rgba(255,255,255,0.6);"></i>
                                Friday: Weekly Holiday
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-5">
                <!-- Recruitment Contact -->
                <div class="card border-0 shadow-lg mb-4 overflow-hidden" style="border-radius: 16px; background: var(--brand-navy);">
                    <div class="card-body p-5">
                        <h4 class="fw-bold mb-3" style="color: #fff; font-size: 1.2rem;">Recruitment Contact</h4>
                        <p class="mb-4" style="color: rgba(255,255,255,0.7); font-size: 0.9rem; line-height: 1.7;">
                            Please reach out to our head office for any recruitment inquiries.
                        </p>

                        @php $headOffice = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first(); @endphp
                        <div class="d-flex align-items-start mb-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3" style="width: 36px; height: 36px; background: rgba(255,255,255,0.15); color: #fff;">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div style="color: rgba(255,255,255,0.9); font-size: 0.9rem; line-height: 1.6;">
                                <strong style="color: #fff;">Head Office:</strong><br>
                                {{ $headOffice->address ?? '' }}
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0 me-3" style="width: 36px; height: 36px; background: rgba(255,255,255,0.15); color: #fff;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <span style="color: rgba(255,255,255,0.9); font-size: 0.9rem;">{{ $headOffice->email ?? '' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Available Downloads -->
                <h4 class="fw-bold mb-3 uerd-page-title" style="font-size: 1.1rem;">Available Downloads</h4>
                <div class="d-flex flex-column gap-3">
                    @foreach ($career as $data)
                        <a href="{{ asset('images/invoked/'.$data->file) }}" target="_blank" class="text-decoration-none">
                             <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center bg-white uerd-project-card" style="border-radius: 12px; transition: all 0.3s ease; border-left: 4px solid var(--brand-teal) !important;">
                                 <div class="d-flex align-items-center justify-content-center rounded-circle me-3 flex-shrink-0" style="width: 44px; height: 44px; background: rgba(79,168,201,.10); color: var(--brand-teal);">
                                     <i class="fa-solid fa-file-pdf fa-lg"></i>
                                 </div>
                                 <div class="flex-grow-1">
                                     <h6 class="fw-bold mb-1 uerd-page-title" style="font-size: 0.9rem;">{{ $data->name }}</h6>
                                     <small class="uerd-body-text" style="font-size: 0.8rem;">PDF Document</small>
                                 </div>
                                 <div class="flex-shrink-0">
                                     <i class="fa-solid fa-download" style="color: var(--brand-teal);"></i>
                                 </div>
                             </div>
                        </a>
                    @endforeach
                    @if(count($career) == 0)
                        <div class="alert alert-light border text-center" style="border-radius: 12px; font-size: 0.9rem;">No active job circulars available.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
    }
</style>

@endsection
