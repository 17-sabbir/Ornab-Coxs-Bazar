@extends('layouts.app')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-body-text { color: var(--brand-text) !important; }
.uerd-download-link { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.uerd-download-link:hover { color: var(--brand-navy); text-decoration: underline; text-underline-offset: 4px; }
.uerd-list-row { background: #fff; border-bottom: 1px solid var(--brand-border); padding: 1.25rem 0; transition: background .2s ease; }
.uerd-list-row:hover { background: var(--brand-bg); }
.uerd-list-row:first-child { border-top: 1px solid var(--brand-border); }
</style>

<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="uerd-page-title">Audit Reports</h1>
        <p class="uerd-body-text">Transparency and Accountability</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Audit Reports</li>
            </ol>
        </nav>
    </div>

    <!-- Intro Section -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <p class="uerd-body-text">
                We are committed to maintaining the highest standards of transparency and accountability. 
                Our annual audit reports are conducted by independent auditors and are available for public review.
            </p>
        </div>
    </div>

    <!-- Reports List -->
    <div class="row">
        @forelse($reports as $report)
            <div class="col-12">
                <div class="uerd-list-row d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div class="flex-grow-1">
                        <h5 class="uerd-page-title mb-1">{{ $report->title }}</h5>
                        <p class="uerd-body-text mb-0" style="font-size: 0.85rem; color: #6B6258;">
                            @if($report->audit_firm) <i class="fas fa-building me-1"></i> <strong>Audit Firm:</strong> {{ $report->audit_firm }} &nbsp;|&nbsp; @endif
                            <i class="far fa-calendar me-1"></i> {{ $report->created_at->format('M d, Y') }}
                            @if($report->summary) &nbsp;|&nbsp; {{ Str::limit($report->summary, 80) }} @endif
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ asset('storage/'.$report->pdf_file) }}" target="_blank" class="uerd-download-link">
                            <i class="fas fa-file-pdf me-1"></i> Download / View PDF
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-info-circle uerd-body-text" style="font-size: 2rem; color: #6B6258;"></i>
                    <p class="uerd-body-text mt-2">No audit reports available at the moment. Please check back later.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Transparency Note -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="uerd-list-row" style="background: var(--brand-bg); border: 1px solid var(--brand-border); border-radius: 8px; padding: 1.5rem;">
                <h5 class="uerd-page-title mb-2"><i class="fas fa-shield-alt me-2" style="color: var(--brand-teal);"></i> Our Commitment to Transparency</h5>
                <p class="uerd-body-text mb-0">
                    Ornab Cox's Bazar is committed to full financial transparency. All audit reports are conducted 
                    by independent, reputable firms and are made available to the public. We believe in accountable 
                    use of donor funds and maintain rigorous financial controls.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('seo')
<title>Audit Reports - {{ $settings->site_name ?? 'Ornab Coxs Bazar' }}</title>
<meta name="description" content="View our annual audit reports. Transparency and accountability in all our financial operations.">
<meta name="keywords" content="audit report, financial audit, transparency, accountability, NGO">
<meta property="og:title" content="Audit Reports - {{ $settings->site_name ?? 'Ornab Coxs Bazar' }}">
<meta property="og:description" content="View our annual audit reports. Transparency and accountability in all our financial operations.">
<meta property="og:type" content="website">
@endsection