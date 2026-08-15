@extends('main')
@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-body-text { color: var(--brand-text) !important; }
.uerd-download-link { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.uerd-download-link:hover { color: var(--brand-navy); text-decoration: underline; text-underline-offset: 4px; }
.uerd-list-row { background: #fff; border-bottom: 1px solid var(--brand-border); padding: 1.25rem 0; transition: background .2s ease; }
.uerd-list-row:hover { background: var(--brand-bg); }
.uerd-list-row:first-child { border-top: 1px solid var(--brand-border); }
.uerd-hero { background: var(--brand-navy); color: #fff; padding: 45px 0 70px; position: relative; }
.uerd-hero::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 35px; background: #fff; border-radius: 35px 35px 0 0; }
</style>

<section class="uerd-hero">
    <div class="container text-center">
        <p class="lead mb-0 text-white">Audited financial statements, income & expenditure, and audit reports.</p>
    </div>
</section>

<section class="py-5" style="background:#fff;">
    <div class="container" style="margin-top: -45px;">
        @if($statements->count() > 0)
            <div class="row">
                @foreach($statements as $statement)
                <div class="col-12">
                    <div class="uerd-list-row d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                        <div class="flex-grow-1">
                            <h5 class="uerd-page-title mb-1">{{ $statement->title }}</h5>
                            <p class="uerd-body-text mb-0" style="font-size: 0.85rem; color: #6B6258;">
                                <i class="far fa-calendar-alt me-1"></i> {{ $statement->year }}
                                @if($statement->description) &nbsp;|&nbsp; {{ Str::limit($statement->description, 80) }} @endif
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            @if($statement->file_path)
                                <a href="{{ asset('storage/'.$statement->file_path) }}" target="_blank" class="uerd-download-link">
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
                <i class="fas fa-chart-bar uerd-body-text" style="font-size: 4rem; color: #6B6258;"></i>
                <h3 class="mt-3 uerd-page-title">No Statements Yet</h3>
                <p class="uerd-body-text">Financial statements will be published here soon.</p>
            </div>
        @endif
    </div>
</section>
@endsection
