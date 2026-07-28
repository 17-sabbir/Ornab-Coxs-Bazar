@extends('main')

@section('content')
<section class="modern-container bg-white pt-5 pb-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
           
            <h1 class="display-4 fw-bold text-dark">{{ $focusArea['title'] }}</h1>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <img src="{{ $focusArea['image'] }}" alt="{{ $focusArea['title'] }}" class="img-fluid rounded-4 shadow-lg w-100" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <span class="badge bg-success rounded-pill px-3 py-2 text-uppercase letter-spacing-1 mb-3">Active</span>
                    <h2 class="fw-bold text-dark mb-4">{{ $focusArea['title'] }}</h2>
                    <p class="lead text-secondary mb-4" style="line-height: 1.8;">{{ $focusArea['full_description'] }}</p>
                    <a href="{{ route('focus.areas') }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to Focus Areas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
