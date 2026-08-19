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
.ornab-hero { background: var(--brand-navy); color: #fff; padding: 45px 0 70px; position: relative; }
.ornab-hero::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 35px; background: #fff; border-radius: 35px 35px 0 0; }
</style>

<section class="ornab-hero">
    <div class="container text-center">
        <p class="lead mb-0 text-white">Explore our yearly achievements, impact and financial highlights.</p>
    </div>
</section>

<section class="py-5" style="background:#fff;">
    <div class="container" style="margin-top: -35px;">
        @if($reports->count() > 0)
            <div class="row">
                @foreach($reports as $report)
                <div class="col-12">
                    <div class="ornab-list-row d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div class="flex-grow-1">
                            <h5 class="ornab-page-title mb-1">{{ $report->title }}</h5>
                            <p class="ornab-body-text mb-1" style="font-size: 0.85rem; color: #6B6258;">
                                <i class="far fa-calendar-alt me-1"></i> {{ $report->year }}
                            </p>
                            @if($report->description)
                                <p class="ornab-body-text mb-0" style="font-size: 0.9rem; color: var(--brand-text);">{{ $report->description }}</p>
                            @endif
                        </div>
                        <div class="flex-shrink-0">
                            @if($report->file_path)
                                <a href="{{ asset('storage/'.$report->file_path) }}" target="_blank" class="ornab-download-link">
                                    <i class="fas fa-download me-1"></i> Download PDF
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-file-alt ornab-body-text" style="font-size: 4rem; color: #6B6258;"></i>
                <h3 class="mt-3 ornab-page-title">No Reports Yet</h3>
                <p class="ornab-body-text">Annual reports will be published here soon.</p>
            </div>
        @endif
    </div>
</section>
@endsection
