@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="display-4">Audit Reports</h1>
        <p class="lead text-muted">Transparency and Accountability</p>
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
            <p class="text-muted">
                We are committed to maintaining the highest standards of transparency and accountability. 
                Our annual audit reports are conducted by independent auditors and are available for public review.
            </p>
        </div>
    </div>

    <!-- Reports List -->
    <div class="row">
        @forelse($reports as $report)
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title mb-0">{{ $report->title }}</h5>
                            <span class="badge badge-primary">{{ $report->year }}</span>
                        </div>
                        
                        @if($report->audit_firm)
                            <p class="text-muted mb-2">
                                <i class="fas fa-building"></i> <strong>Audit Firm:</strong> {{ $report->audit_firm }}
                            </p>
                        @endif

                        @if($report->summary)
                            <p class="card-text text-muted mb-3">{{ Str::limit($report->summary, 150) }}</p>
                        @endif

                        <div class="mt-auto">
                            <a href="{{ asset('storage/'.$report->pdf_file) }}" target="_blank" class="btn btn-primary btn-block">
                                <i class="fas fa-file-pdf"></i> Download / View PDF
                            </a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <small>
                            <i class="far fa-calendar"></i> Added: {{ $report->created_at->format('M d, Y') }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No audit reports available at the moment. Please check back later.
                </div>
            </div>
        @endforelse
    </div>

    <!-- Transparency Note -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-shield-alt text-primary"></i> Our Commitment to Transparency</h5>
                    <p class="card-text mb-0">
                        Ornab Cox's Bazar is committed to full financial transparency. All audit reports are conducted 
                        by independent, reputable firms and are made available to the public. We believe in accountable 
                        use of donor funds and maintain rigorous financial controls.
                    </p>
                </div>
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