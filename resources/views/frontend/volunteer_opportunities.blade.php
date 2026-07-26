@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Volunteer Opportunities</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Get Involved</li>
      </ol>
      <div class="mt-3">
        <a href="{{ route('volunteer.apply') }}" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm">
          <i class="fa-solid fa-hand-holding-heart me-2"></i> Apply to Volunteer
        </a>
      </div>
    </div>
  </section>

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container">
    <div class="container" data-aos="fade-up">

      <div class="row g-4">
        @if(isset($volunteers) && count($volunteers) > 0)
            @foreach($volunteers as $volunteer)
            <div class="col-lg-6">
                <div class="modern-card h-100 p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h4 class="fw-bold m-0 text-primary">{{ $volunteer->title }}</h4>
                        @if($volunteer->status == 'open')
                            <span class="badge bg-success rounded-pill px-3 py-2">Open</span>
                        @else
                            <span class="badge bg-secondary rounded-pill px-3 py-2">Closed</span>
                        @endif
                    </div>
                    
                    @if($volunteer->location)
                    <div class="text-muted mb-3 small">
                        <i class="fa-solid fa-location-dot me-1 text-accent"></i> {{ $volunteer->location }}
                    </div>
                    @endif
                    
                    <p class="modern-text mb-4">{{ $volunteer->description }}</p>
                    
                    @if($volunteer->requirements)
                    <div class="bg-light p-3 rounded-3 mb-4 border">
                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check me-2 text-primary"></i> Requirements:</h6>
                        <p class="small mb-0 text-muted">{{ $volunteer->requirements }}</p>
                    </div>
                    @endif
                    
                    <div class="mt-auto pt-3 border-top">
                        @if($volunteer->status == 'open')
                            <a href="{{ route('contact') }}" class="btn btn-modern w-100">Apply Now <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        @else
                            <button disabled class="btn btn-light w-100 text-muted">Applications Closed</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center py-5">
                <div class="modern-card">
                    <i class="fa-solid fa-file-circle-xmark display-4 text-muted mb-3"></i>
                    <h3>No Open Positions</h3>
                    <p class="text-muted">There are currently no volunteer opportunities available. Please check back later.</p>
                </div>
            </div>
        @endif
      </div>

    </div>
  </section>

@endsection
