@extends('main')

@section('title', 'Project Archive - Ornab Cox\'s Bazar')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-page-subtitle { color: var(--brand-text); opacity: 0.6; }
.uerd-project-card { background: #fff; border: 1px solid var(--brand-border); transition: transform .3s ease, box-shadow .3s ease; }
.uerd-project-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(18,43,107,.12); }
.uerd-status-completed { background: rgba(79,168,201,.10) !important; color: var(--brand-teal) !important; }
.uerd-objectives { color: var(--brand-navy); border-bottom: 1px solid rgba(18,43,107,.1); }
.uerd-body-muted { color: var(--brand-text); opacity: 0.6; }
.uerd-read-more { color: var(--brand-teal); border: 1px solid var(--brand-teal); background: transparent; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.uerd-read-more:hover { color: var(--brand-navy); border-color: var(--brand-navy); text-decoration: none; }
</style>
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="display-5 fw-bold uerd-page-title">Project Archive</h2>
            <p class="lead uerd-page-subtitle">A comprehensive list of projects we have successfully delivered for our communities</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($project as $data)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 uerd-project-card" style="border-top: 4px solid var(--brand-teal);">
                {{-- Image Section (Top) --}}
                <div style="height: 220px; overflow: hidden; position: relative;">
                    @if(!empty($data->image))
                        <img src="{{ asset('images/project/'.$data->image) }}" class="card-img-top w-100 h-100" alt="{{ $data->project_name }}" style="object-fit: cover;">
                    @else
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-folder-open fa-3x uerd-body-muted" style="opacity: 0.25;"></i>
                        </div>
                    @endif
                    <span class="position-absolute top-0 end-0 m-3 badge uerd-status-completed">Completed</span>
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold uerd-page-title mb-3" style="min-height: 48px;">{{Str::limit($data->project_name, 60)}}</h5>
                    
                    <h6 class="uerd-objectives fw-bold pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                    <p class="card-text uerd-body-muted mb-4 flex-grow-1" style="font-size: 0.9rem;">
                        {!! nl2br(Str::limit($data->objectives, 150)) !!}
                    </p>

                    <div class="small uerd-body-muted mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                            <span class="text-end">{{ Str::limit($data->locations, 20) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                            <span class="text-end">{{ project_period($data) }}</span>
                        </div>
                    </div>

                    <a href="{{ route('ongoing.project.view', $data->id) }}" class="uerd-read-more w-100 mt-auto rounded-pill justify-content-center">
                        Read More <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fa-regular fa-folder-open fa-4x uerd-body-muted" style="opacity: 0.25; margin-bottom: 1rem;"></i>
            <h4 class="uerd-body-muted">No completed projects yet</h4>
        </div>
        @endforelse
    </div>
</div>
@endsection