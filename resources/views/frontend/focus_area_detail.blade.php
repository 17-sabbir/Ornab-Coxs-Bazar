@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-status-active { background: rgba(76,122,61,.10) !important; color: var(--brand-green) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-back-link { color: var(--brand-teal); border: 1px solid var(--brand-teal); background: transparent; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.ornab-back-link:hover { color: var(--brand-navy); border-color: var(--brand-navy); text-decoration: none; }
</style>
<section class="ornab-section-alt pt-5 pb-5">
    <div class="container" data-aos="fade-up">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold ornab-page-title">{{ $focusArea['title'] }}</h1>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-5">
                <img src="{{ $focusArea['image'] }}" alt="{{ $focusArea['title'] }}" class="img-fluid rounded-4 shadow-lg w-100" style="max-height: 400px; object-fit: cover;">
            </div>
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <span class="badge rounded-pill px-3 py-2 text-uppercase letter-spacing-1 mb-3 ornab-status-active">Active</span>
                    <h2 class="fw-bold ornab-page-title mb-4">{{ $focusArea['title'] }}</h2>
                    <p class="lead ornab-body-text mb-4" style="line-height: 1.8;">{{ $focusArea['full_description'] }}</p>
                    <a href="{{ route('focus.areas') }}" class="ornab-back-link rounded-pill px-4 py-2 fw-bold">
                        <i class="fa-solid fa-arrow-left me-2"></i> Back to Focus Areas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
