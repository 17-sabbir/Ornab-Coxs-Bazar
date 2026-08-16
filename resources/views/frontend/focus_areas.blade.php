@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-read-more { color: var(--brand-teal); border: 1px solid var(--brand-teal); background: transparent; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.ornab-read-more:hover { color: var(--brand-navy); border-color: var(--brand-navy); text-decoration: none; }
</style>
<section class="ornab-section-alt pt-5 pb-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5 pb-3">
            <h2 class="display-4 fw-bold ornab-page-title">Key Areas We Work In</h2>
            <p class="lead ornab-body-text mt-3">Discover how we are making a difference across key sectors in Cox's Bazar.</p>
        </div>

        <div class="row g-4">
            @foreach($focusAreas as $area)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden ornab-project-card">
                    @if($area->image_path)
                        <img src="{{ asset('storage/' . $area->image_path) }}" class="card-img-top" alt="{{ $area->title }}" style="height: 220px; object-fit: cover;">
                    @else
                        <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 220px;">
                            <i class="fa-solid fa-folder-open fa-3x text-muted opacity-25"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold ornab-page-title mb-3">{{ $area->title }}</h5>
                        <p class="ornab-body-text mb-4">{{ $area->description }}</p>
                        <a href="{{ route('focus.area.detail', $area->id) }}" class="ornab-read-more rounded-pill px-4 py-2 fw-bold mt-auto">
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
