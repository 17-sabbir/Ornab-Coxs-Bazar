@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-download-link { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.ornab-download-link:hover { color: var(--brand-navy); text-decoration: underline; text-underline-offset: 4px; }
.ornab-list-row { background: #fff; border-bottom: 1px solid var(--brand-border); padding: 1.25rem 0; transition: background .2s ease; }
.ornab-list-row:hover { background: var(--brand-bg); }
.ornab-list-row:first-child { border-top: 1px solid var(--brand-border); }
.ornab-badge-latest { background: var(--brand-coral); color: #fff; font-size: 0.75rem; font-weight: 700; padding: 6px 12px; border-radius: 50px; }
</style>

    <!-- ======= Strategic Plan Section ======= -->
    <section id="contact" class="contact bg-light p-0">
        <div class="container bg-white py-5" data-aos="fade-up">
            <div class="section-title">
                <h2 class="ornab-page-title">Strategic Plan</h2>

                <div class="row">
                    @forelse ($strategicPlans as $plan)
                        @if (!empty($plan->pdf_file) || !empty($plan->description))
                        <div class="col-12">
                            <div class="ornab-list-row d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <h5 class="ornab-page-title mb-0">{{ $plan->title }}</h5>
                                        @if(!empty($plan->pdf_file))
                                            <span class="ornab-badge-latest">Latest</span>
                                        @endif
                                    </div>
                                    @if (!empty($plan->description))
                                        <p class="ornab-body-text mb-0" style="font-size: 0.85rem; color: #6B6258;">{{ Str::limit($plan->description, 100) }}</p>
                                    @endif
                                </div>
                                <div class="flex-shrink-0">
                                    @if (!empty($plan->pdf_file))
                                        <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" target="_blank" download class="ornab-download-link">
                                            <i class="fa-solid fa-cloud-arrow-down me-1"></i> View PDF
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fa-solid fa-folder-open ornab-body-text" style="font-size: 3rem; color: #6B6258;"></i>
                            <h3 class="mt-3 ornab-page-title">No Active Plans</h3>
                            <p class="ornab-body-text">No strategic plan documents are currently available online.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
