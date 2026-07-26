@extends('main')

@section('title', 'Project Archive - Ornab Cox\'s Bazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="display-5 fw-bold text-danger">Project Archive</h2>
            <p class="lead text-secondary">A comprehensive list of projects we have successfully delivered for our communities</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($project as $data)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 border-top border-4 border-secondary">
                {{-- Image Section (Top) --}}
                <div style="height: 220px; overflow: hidden; position: relative;">
                    @if(!empty($data->image))
                        <img src="{{ asset('images/project/'.$data->image) }}" class="card-img-top w-100 h-100" alt="{{ $data->project_name }}" style="object-fit: cover;">
                    @else
                        <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-folder-open fa-3x text-secondary opacity-25"></i>
                        </div>
                    @endif
                    <span class="position-absolute top-0 end-0 m-3 badge bg-secondary">Completed</span>
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark mb-3" style="min-height: 48px;">{{Str::limit($data->project_name, 60)}}</h5>
                    
                    <h6 class="text-danger fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                    <p class="card-text text-secondary mb-4 flex-grow-1" style="font-size: 0.9rem;">
                        {!! nl2br(Str::limit($data->objectives, 150)) !!}
                    </p>

                    <div class="small text-muted mb-3">
                        <div class="d-flex justify-content-between mb-1">
                            <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                            <span class="text-end">{{ Str::limit($data->locations, 20) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                            <span class="text-end">{{ project_period($data) }}</span>
                        </div>
                    </div>

                    <a href="{{ route('ongoing.project.view', $data->id) }}" class="btn btn-outline-secondary w-100 mt-auto rounded-pill">
                        Read More <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="fa-regular fa-folder-open fa-4x text-secondary opacity-25 mb-3"></i>
            <h4 class="text-secondary">No completed projects yet</h4>
        </div>
        @endforelse
    </div>
</div>
@endsection