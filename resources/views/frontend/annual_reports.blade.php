@extends('main')
@section('content')
<style>
    .transparency-hero {
        background: linear-gradient(135deg, #0d9488, #0d5f49);
        color: #fff;
        padding: 45px 0 70px;
        position: relative;
    }
    .transparency-hero::after {
        content: "";
        position: absolute;
        left: 0; right: 0; bottom: -1px;
        height: 35px;
        background: #f5f7fa;
        border-radius: 35px 35px 0 0;
    }
    .transparency-hero h1 { font-weight: 700; letter-spacing: .5px; }
    .report-card {
        border: none;
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(13,94,73,.10);
        transition: transform .3s ease, box-shadow .3s ease;
    }
    .report-card:hover { transform: translateY(-6px); box-shadow: 0 12px 30px rgba(13,94,73,.18); }
    .report-card .icon-box {
        height: 190px;
        background: linear-gradient(135deg, #e6f7f2, #d3f0e8);
        display: flex; align-items: center; justify-content: center;
    }
    .report-card .icon-box i { font-size: 4rem; color: #0d9488; }
    .report-card .btn-download {
        background: #0d9488; border: none; color: #fff; font-weight: 600;
        border-radius: 8px;
    }
    .report-card .btn-download:hover { background: #0d5f49; }
</style>

<section class="transparency-hero">
    <div class="container text-center">
        <p class="lead mb-0">Explore our yearly achievements, impact and financial highlights.</p>
    </div>
</section>

<section class="py-5" style="background:#f5f7fa;">
    <div class="container" style="margin-top: -35px;">
        @if($reports->count() > 0)
            <div class="row g-4">
                @foreach($reports as $report)
                <div class="col-md-6 col-lg-4">
                    <div class="card report-card h-100">
                        @if($report->cover_image)
                            <img src="{{ asset('storage/'.$report->cover_image) }}" class="card-img-top" alt="{{ $report->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="icon-box">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $report->title }}</h5>
                            <p class="text-muted mb-2"><i class="far fa-calendar-alt"></i> {{ $report->year }}</p>
                            @if($report->description)
                                <p class="card-text text-muted small">{{ $report->description }}</p>
                            @endif
                            <div class="mt-auto">
                                @if($report->file_path)
                                    <a href="{{ asset('storage/'.$report->file_path) }}" target="_blank" class="btn btn-download w-100">
                                        <i class="fas fa-download"></i> Download PDF
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                <i class="fas fa-file-alt text-muted" style="font-size: 4rem;"></i>
                <h3 class="mt-3">No Reports Yet</h3>
                <p class="text-muted">Annual reports will be published here soon.</p>
            </div>
        @endif
    </div>
</section>
@endsection
