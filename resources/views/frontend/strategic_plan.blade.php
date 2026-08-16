@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-download-link { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.ornab-download-link:hover { color: var(--brand-navy); text-decoration: none; }
.ornab-list-row { background: #fff; border-bottom: 1px solid var(--brand-border); padding: 1.25rem 0; transition: background .2s ease; }
.ornab-list-row:hover { background: var(--brand-bg); }
.ornab-list-row:first-child { border-top: 1px solid var(--brand-border); }
.ornab-badge-latest { background: var(--brand-coral); color: #fff; font-size: 0.75rem; font-weight: 700; padding: 6px 12px; border-radius: 50px; }

.ornab-plan-card {
    background: #fff;
    border: 1px solid var(--brand-border);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}
.ornab-plan-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background: var(--brand-teal);
    transition: width 0.3s ease;
}
.ornab-plan-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(18, 43, 107, 0.1);
    border-color: var(--brand-teal);
}
.ornab-plan-card:hover::before {
    width: 6px;
}
.ornab-plan-title {
    color: var(--brand-navy);
    font-weight: 700;
    font-size: 1.15rem;
    margin-bottom: 0.5rem;
}
.ornab-plan-desc {
    color: var(--brand-text);
    font-size: 0.95rem;
    line-height: 1.7;
    margin-bottom: 0;
}
.ornab-plan-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.9rem;
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;
    background: transparent;
    color: var(--brand-teal);
    border: 2px solid var(--brand-teal);
}
.ornab-plan-btn:hover {
    background: var(--brand-teal);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(79, 168, 201, 0.3);
}
.ornab-no-data {
    text-align: center;
    padding: 4rem 1rem;
}
.ornab-no-data i {
    font-size: 3.5rem;
    color: #6B6258;
    opacity: 0.3;
    margin-bottom: 1rem;
}
</style>

<!-- ======= Strategic Plan Section ======= -->
<section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
        <div class="section-title">
            <h2 class="ornab-page-title">Strategic Plan</h2>
        </div>

        @forelse ($strategicPlans as $plan)
            @if (!empty($plan->pdf_file) || !empty($plan->description))
            <div class="ornab-plan-card">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="ornab-plan-title mb-0">{{ $plan->title }}</h5>
                            @if(!empty($plan->pdf_file))
                                <span class="ornab-badge-latest">Latest</span>
                            @endif
                        </div>
                        @if (!empty($plan->description))
                            <p class="ornab-plan-desc">{{ $plan->description }}</p>
                        @endif
                    </div>
                    <div class="col-md-4 text-md-end mt-3 mt-md-0">
                        @if (!empty($plan->pdf_file))
                            <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" 
                               target="_blank" 
                               class="ornab-plan-btn">
                                <i class="fa-solid fa-cloud-arrow-down"></i> View PDF
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        @empty
            <div class="ornab-no-data">
                <i class="fa-solid fa-folder-open d-block"></i>
                <h3 class="ornab-page-title mt-3">No Active Plans</h3>
                <p class="ornab-body-text">No strategic plan documents are currently available online.</p>
            </div>
        @endforelse
    </div>
</section>

@endsection
