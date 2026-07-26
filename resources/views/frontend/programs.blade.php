@extends('main')

@section('content')


  <!-- ======= Alternating Features Section ======= -->
  <section class="modern-container bg-white">
    <div class="container" data-aos="fade-up">

      <div class="text-center mb-5 pb-3">
          <span class="d-inline-block py-1 px-3 rounded-pill bg-light text-primary fw-bold text-uppercase shadow-sm mb-3" style="letter-spacing: 1px;">
              Our Core Programs
          </span>
          <h2 class="display-4 fw-bold text-dark">Impact in Action</h2>
      </div>

      @if(isset($programs) && count($programs) > 0)
        <div class="d-flex flex-column gap-5">
            @foreach($programs as $key => $program)
            <!-- Program Item {{ $key + 1 }} -->
            <div class="row align-items-center g-5 program-row {{ $key % 2 != 0 ? 'flex-row-reverse' : '' }}">
                
                <!-- Image Column -->
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="image-frame rounded-4 overflow-hidden shadow-lg position-relative">
                             <a href="{{ route('programs.view', $program->id) }}">
                                @if($program->image)
                                <img src="{{ asset('images/programs/'.$program->image) }}" class="img-fluid w-100 object-fit-cover scale-hover" alt="{{ $program->title }}" style="height: 400px;">
                                @else
                                <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="img-fluid w-100 object-fit-cover scale-hover" alt="{{ $program->title }}" style="height: 400px;">
                                @endif
                             </a>
                             <div class="overlay-gradient"></div>
                        </div>
                        <!-- Decorative Shape -->
                        <div class="position-absolute {{ $key % 2 != 0 ? 'top-0 start-0 translate-middle' : 'bottom-0 end-0 translate-middle' }}  z-n1 d-none d-lg-block">
                             <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="50" cy="50" r="50" fill="var(--modern-accent)" opacity="0.2"/>
                             </svg>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-6">
                    <div class="ps-lg-4 pe-lg-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="fs-1 fw-bold text-light-gray me-3">0{{ $key + 1 }}</span>
                            <span class="badge {{ $program->status == 'active' ? 'bg-success' : 'bg-secondary' }} rounded-pill px-3 py-2 text-uppercase letter-spacing-1">{{ ucfirst($program->status) }}</span>
                        </div>
                        
                        <h2 class="fw-bold text-dark mb-4 display-6">
                            <a href="{{ route('programs.view', $program->id) }}" class="text-decoration-none text-dark hover-prime">{{ $program->title }}</a>
                        </h2>
                        
                        <p class="lead text-secondary mb-4" style="line-height: 1.8;">
                            {{ Str::limit($program->description, 200) }}
                        </p>
                        
                        <a href="{{ route('programs.view', $program->id) }}" class="btn btn-outline-primary rounded-pill px-4 py-2 fw-bold explore-btn">
                            Explore Program <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
      @else
        <div class="text-center py-5">
            <h3 class="text-muted">No programs available currently.</h3>
        </div>
      @endif

    </div>
  </section>

  <style>
      .text-light-gray { color: #e9ecef; }
      .hover-prime:hover { color: var(--modern-primary) !important; transition: color 0.3s; }
      .scale-hover { transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94); }
      .image-frame:hover .scale-hover { transform: scale(1.05); }
      .image-frame { border: 1px solid rgba(0,0,0,0.05); }
      .program-row { 
          opacity: 0; 
          animation: fadeSlideUp 0.8s forwards; 
      }
      @keyframes fadeSlideUp {
          from { opacity: 0; transform: translateY(30px); }
          to { opacity: 1; transform: translateY(0); }
      }
      .program-row:nth-child(1) { animation-delay: 0.1s; }
      .program-row:nth-child(2) { animation-delay: 0.2s; }
      .program-row:nth-child(3) { animation-delay: 0.3s; }
  </style>
@endsection
