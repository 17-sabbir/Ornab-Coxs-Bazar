@extends('main')

@section('content')
<section class="modern-container bg-white pt-5 pb-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5 pb-3">
            <h2 class="display-4 fw-bold text-dark">Key Areas We Work In</h2>
            <p class="lead text-secondary mt-3">Discover how we are making a difference across key sectors in Cox's Bazar.</p>
        </div>

        <div class="row g-4">
            @foreach($focusAreas as $area)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                    <img src="{{ $area['image'] }}" class="card-img-top" alt="{{ $area['title'] }}" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="fw-bold text-dark mb-3">{{ $area['title'] }}</h5>
                        <p class="text-secondary mb-4">{{ $area['short_description'] }}</p>
                        <a href="{{ route('focus.area.detail', $area['slug']) }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold mt-auto">
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
