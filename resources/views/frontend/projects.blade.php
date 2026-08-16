@extends('main')

@section('title', 'Our Projects - Ornab Cox\'s Bazar')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-page-subtitle { color: var(--brand-text); opacity: 0.6; }
.ornab-project-card { background: #fff; border: 1px solid var(--brand-border); transition: transform .3s ease, box-shadow .3s ease; }
.ornab-project-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(18,43,107,.12); }
.ornab-status-ongoing { background: rgba(76,122,61,.10) !important; color: var(--brand-green) !important; }
.ornab-status-completed { background: rgba(79,168,201,.10) !important; color: var(--brand-teal) !important; }
.ornab-objectives { color: var(--brand-navy); border-bottom: 1px solid rgba(18,43,107,.1); }
.ornab-body-muted { color: var(--brand-text); opacity: 0.6; }
.ornab-read-more { color: var(--brand-teal); border: 1px solid var(--brand-teal); background: transparent; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.ornab-read-more:hover { color: var(--brand-navy); border-color: var(--brand-navy); text-decoration: none; }
.ornab-tabs .nav-link { color: var(--brand-text); opacity: 0.6; }
.ornab-tabs .nav-link.active { color: var(--brand-navy) !important; border-bottom: 2px solid var(--brand-coral) !important; background: transparent !important; }
</style>
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2 class="display-5 fw-bold ornab-page-title">Our Development Journey</h2>
            <p class="lead ornab-page-subtitle">Explore a selection of our current and past projects, showcasing our ideas, innovation, and impact.</p>
        </div>
    </div>

    <!-- Tabs for Filtering -->
    <ul class="nav nav-pills mb-4 justify-content-center ornab-tabs" id="pills-tab" role="tablist">
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
                @php $projectStatus = strtolower($project->status ?? ''); @endphp
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0 ornab-project-card" style="border-top: 4px solid {{ $projectStatus == 'ongoing' ? 'var(--brand-green)' : 'var(--brand-teal)' }};">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x ornab-body-muted opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge {{ $projectStatus == 'ongoing' ? 'ornab-status-ongoing' : 'ornab-status-completed' }}">{{ ucfirst($project->status) }}</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold ornab-page-title mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="ornab-objectives fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text ornab-body-muted mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small ornab-body-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="ornab-read-more w-100 mt-auto rounded-pill justify-content-center">
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
                @foreach($projects->filter(function($project){ return strtolower($project->status) == 'ongoing'; }) as $project)
                 <div class="col-lg-4 col-md-6">
                     <div class="card h-100 shadow-sm border-0 ornab-project-card" style="border-top: 4px solid var(--brand-green);">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x ornab-body-muted opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge ornab-status-ongoing">{{ ucfirst($project->status) }}</span>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold ornab-page-title mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="ornab-objectives fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text ornab-body-muted mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small ornab-body-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="ornab-read-more w-100 mt-auto rounded-pill justify-content-center">
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
                @foreach($projects->filter(function($project){ return strtolower($project->status) == 'completed'; }) as $project)
                 <div class="col-lg-4 col-md-6">
                     <div class="card h-100 shadow-sm border-0 ornab-project-card" style="border-top: 4px solid var(--brand-teal);">
                        {{-- Image Section (Top) --}}
                        <div style="height: 220px; overflow: hidden; position: relative;">
                            @if(!empty($project->image))
                                <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top w-100 h-100" alt="{{ $project->project_name }}" style="object-fit: cover;">
                            @else
                                <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-folder-open fa-3x ornab-body-muted opacity-25"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-3 badge ornab-status-completed">{{ ucfirst($project->status) }}</span>
                        </div>

                         <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold ornab-page-title mb-3" style="min-height: 48px;">{{Str::limit($project->project_name, 60)}}</h5>
                            
                            <h6 class="ornab-objectives fw-bold border-bottom pb-2 mb-3" style="font-size: 0.9rem;">Objectives</h6>
                            <p class="card-text ornab-body-muted mb-4 flex-grow-1" style="font-size: 0.9rem;">
                                {!! nl2br(Str::limit($project->objectives, 150)) !!}
                            </p>

                            <div class="small ornab-body-muted mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <strong><i class="fa-solid fa-location-dot me-1"></i> Location:</strong>
                                    <span class="text-end">{{ Str::limit($project->locations, 20) }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <strong><i class="fa-regular fa-clock me-1"></i> Duration:</strong>
                                    <span class="text-end">{{ project_period($project) }}</span>
                                </div>
                            </div>

                            <a href="{{ route('ongoing.project.view', $project->id) }}" class="ornab-read-more w-100 mt-auto rounded-pill justify-content-center">
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
