@extends('main')

@section('content')

  <div class="container pt-5 pb-3 text-center">
      <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          {{ ucfirst($project->status ?? 'Project') }} Details
      </h1>
  </div>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Details Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

        <div class="row">
            <div class="col-md-4">
            @if(!empty($project->cover_image))
              <img src="{{ asset('images/project/'.$project->cover_image) }}" class="card-img-top" alt="project" width="100%">
            @elseif(!empty($project->image))
              <img src="{{ asset('images/project/'.$project->image) }}" class="card-img-top" alt="project" width="100%">
            @endif
            </div>
            <div class="col-md-8 text-left">
            <h2 class="text-left fw-bold">{{ $project->project_name }}</h2>

                <div class="card bg-light mb-3 mt-3">
                    <div class="card-body">
                        <div class="mb-2">
                            <strong>Status:</strong>
                            <span class="badge ms-2 {{ $project->status == 'ongoing' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($project->status ?? 'N/A') }}
                            </span>
                        </div>

                        @if($project->locations)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Locations:</div>
                          <div class="col-sm-9">{{ $project->locations }}</div>
                        </div>
                        @endif

                        @if($project->project_duration || $project->start_year)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Duration:</div>
                          <div class="col-sm-9">{{ project_period($project) }}</div>
                        </div>
                        @endif

                        @if($project->donors)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Donors:</div>
                          <div class="col-sm-9">{{ $project->donors }}</div>
                        </div>
                        @endif

                        @if($project->remark)
                        <div class="row mb-2">
                            <div class="col-sm-3 fw-bold">Remark:</div>
                          <div class="col-sm-9">{{ $project->remark }}</div>
                        </div>
                        @endif
                    </div>
                </div>

                <h5 class="fw-bold">Objective of the Project</h5>
                <p style="text-align:justify;">
                  {{ $project->objectives }}
                </p>
            </div>
            @if($project->galleries && $project->galleries->count())
            <div class="col-12 py-3">
                <h5 class="fw-bold">Project Gallery</h5>
                <div class="row g-3">
                    @foreach($project->galleries as $photo)
                    <div class="col-6 col-md-3">
                        <a href="{{ asset('images/project/'.$photo->image) }}" target="_blank">
                            <img src="{{ asset('images/project/'.$photo->image) }}" class="img-fluid rounded border" alt="project photo" style="width:100%;height:160px;object-fit:cover;">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($project->reports && $project->reports->count())
            <div class="col-12 py-3">
                <h5 class="fw-bold">All Reports</h5>
                <div class="list-group">
                    @foreach($project->reports as $report)
                    <a href="{{ route('projects.reports.download', $report->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <span><i class="fa-solid fa-file-pdf text-danger me-2"></i> {{ $report->file }}</span>
                        <span class="badge bg-success rounded-pill">Download</span>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
            <div class="py-3">
                <a href="{{ $project->status == 'completed' ? route('project.archieve') : route('ongoing.project') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to {{ $project->status == 'completed' ? 'Project Archive' : 'Ongoing Projects' }}</a>
            </div>
        </div>
      </div>

    </div>
  </section><!-- End Project Details Section -->

@endsection
