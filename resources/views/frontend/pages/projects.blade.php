@extends('main')

@section('title', 'Our Projects - Ornab Cox\'s Bazar')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="display-5 fw-bold text-danger">Development Projects at a Glance</h2>
            <p class="lead text-secondary">A comprehensive overview of our current and past initiatives</p>
        </div>
    </div>

    <!-- Tabs for Filtering -->
    <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active px-4 py-2 fw-bold rounded-pill" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-selected="true">All Projects</button>
        </li>
        <li class="nav-item" role="presentation">
             <button class="nav-link px-4 py-2 fw-bold rounded-pill mx-2" id="pills-ongoing-tab" data-bs-toggle="pill" data-bs-target="#pills-ongoing" type="button" role="tab" aria-selected="false">Ongoing</button>
        </li>
         <li class="nav-item" role="presentation">
            <button class="nav-link px-4 py-2 fw-bold rounded-pill" id="pills-completed-tab" data-bs-toggle="pill" data-bs-target="#pills-completed" type="button" role="tab" aria-selected="false">Completed</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <!-- All Projects Tab -->
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 {{ $project->status == 'ongoing' ? 'border-success' : 'border-secondary' }}">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x text-secondary opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge {{ $project->status == 'ongoing' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($project->status) }}</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="text-danger fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text text-secondary mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small text-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="btn btn-outline-primary w-100 mt-auto rounded-pill">
                                Read More <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Ongoing Tab -->
        <div class="tab-pane fade" id="pills-ongoing" role="tabpanel">
             <div class="row g-4">
                @foreach($projects->where('status', 'ongoing') as $project)
                 <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 border-success">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x text-secondary opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge bg-success">{{ ucfirst($project->status) }}</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="text-danger fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text text-secondary mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small text-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="btn btn-outline-success w-100 mt-auto rounded-pill">
                                Read More <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Completed Tab -->
        <div class="tab-pane fade" id="pills-completed" role="tabpanel">
             <div class="row g-4">
                @foreach($projects->where('status', 'completed') as $project)
                 <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 border-top border-4 border-secondary">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x text-secondary opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge bg-secondary">{{ ucfirst($project->status) }}</span>
                        </div>

                         <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="text-danger fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text text-secondary mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small text-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="btn btn-outline-secondary w-100 mt-auto rounded-pill">
                                Read More <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
