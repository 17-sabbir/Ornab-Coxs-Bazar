@extends('main')

@section('content')

    <!-- ======= Strategic Plan Section ======= -->
    <section id="contact" class="contact bg-light p-0">
        <div class="container bg-white py-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Strategic Plan</h2>

                <div class="row g-4 justify-content-center">
                    @forelse ($strategicPlans as $plan)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" target="_blank" download class="text-decoration-none">
                                <div class="modern-card h-100 p-0 overflow-hidden hover-lift d-flex flex-column">

                                    <div class="position-relative bg-light border-bottom p-4 text-center d-flex align-items-center justify-content-center" style="height: 200px;">
                                        @if (!empty($plan->image))
                                        <img src="{{ asset('images/strategic_plans/images/'.$plan->image) }}" alt="{{ $plan->title }}" class="img-fluid rounded shadow-sm" style="max-height: 100%; width: auto;">
                                        @else
                                        <div class="text-muted opacity-25">
                                            <i class="fa-solid fa-file-pdf fa-5x"></i>
                                        </div>
                                        @endif

                                        <div class="position-absolute top-0 end-0 p-2">
                                            <span class="badge bg-danger rounded-pill"><i class="fa-solid fa-download me-1"></i> PDF</span>
                                        </div>
                                    </div>

                                    <div class="p-4 flex-grow-1 d-flex flex-column">
                                        <h5 class="fw-bold text-dark mb-2">{{ $plan->title }}</h5>
                                        @if (!empty($plan->description))
                                        <p class="text-secondary small mb-0 flex-grow-1">{{ $plan->description }}</p>
                                        @endif
                                    </div>

                                    <div class="p-3 bg-light border-top text-center">
                                        <span class="fw-bold text-primary small text-uppercase">Click to Download</span>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="modern-card">
                                <i class="fa-solid fa-folder-open display-4 text-muted mb-3 opacity-50"></i>
                                <h3>No Active Plans</h3>
                                <p class="text-muted">No strategic plan documents are currently available online.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

@endsection
