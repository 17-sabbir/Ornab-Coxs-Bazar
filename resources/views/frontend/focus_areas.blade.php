@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-body-text { color: var(--brand-text) !important; }
.uerd-read-more { color: var(--brand-teal); border: 1px solid var(--brand-teal); background: transparent; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.uerd-read-more:hover { color: var(--brand-navy); border-color: var(--brand-navy); text-decoration: none; }
</style>
<section class="uerd-section-alt pt-5 pb-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5 pb-3">
            <h2 class="display-4 fw-bold uerd-page-title">Key Areas We Work In</h2>
            <p class="lead uerd-body-text mt-3">Discover how we are making a difference across key sectors in Cox's Bazar.</p>
        </div>

        <div class="row g-4">
            @foreach($focusAreas as $area)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden uerd-project-card">
                    <img src="{{ $area['image'] }}" class="card-img-top" alt="{{ $area['title'] }}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold uerd-page-title mb-3">{{ $area['title'] }}</h5>
                        <p class="uerd-body-text mb-4">{{ $area['short_description'] }}</p>
                        <a href="{{ route('focus.area.detail', $area['slug']) }}" class="uerd-read-more rounded-pill px-4 py-2 fw-bold mt-auto">
                            Learn More <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
