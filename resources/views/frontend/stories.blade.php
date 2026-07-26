@extends('main')

@section('content')
  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Success Stories</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Success Stories</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container" style="background-color: #f9f9f9;">
    <div class="container" data-aos="fade-up">

      <div class="text-center mb-5">
          <span class="text-primary fw-bold text-uppercase letter-spacing-2">Real Impact</span>
          <h2 class="modern-title d-block mt-2">Voice of Changes</h2>
          <p class="modern-text mx-auto" style="max-width: 600px;">
              See how our initiatives are transforming lives, one story at a time.
          </p>
      </div>

      @if(isset($stories) && count($stories) > 0)
        <!-- Masonry-ish Grid (using standard columns but styled differently) -->
        <div class="row g-4">
            @foreach($stories as $index => $story)
            <div class="col-lg-4 col-md-6">
                <!-- Staggered Layout effect: Offset every 2nd item on large screens if desired, or just card variation -->
                <div class="card border-0 shadow-sm h-100 overflow-hidden story-card-modern hover-lift" 
                     style="border-radius: 15px; transition: all 0.3s ease; background: white;">
                    
                    <!-- Top Image Area -->
                    <div class="position-relative" style="height: 200px; overflow: hidden;">
                        @if($story->image)
                            <img src="{{ asset('images/stories/'.$story->image) }}" class="w-100 h-100" style="object-fit: cover; transition: transform 0.5s ease;" alt="{{ $story->beneficiary_name }}">
                        @else
                            <div class="w-100 h-100 bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-user fa-3x text-muted opacity-50"></i>
                            </div>
                        @endif
                        <div class="overlay position-absolute w-100 h-100 top-0 start-0" style="background: linear-gradient(to bottom, transparent 60%, rgba(0,0,0,0.7));"></div>
                        
                        <!-- Rating Badge floating -->
                        <div class="position-absolute top-0 end-0 m-3 bg-white px-2 py-1 rounded-pill shadow-sm">
                             <span class="text-warning small"><i class="fa-solid fa-star"></i> {{ $story->rating ?? 5 }}</span>
                        </div>
                    </div>

                    <!-- Content Body -->
                    <div class="card-body p-4 position-relative">
                        <!-- Quote Icon Floating -->
                        <div class="position-absolute translate-middle-y bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow" 
                             style="width: 50px; height: 50px; top: 0; right: 20px; font-size: 1.2rem;">
                            <i class="fa-solid fa-quote-right"></i>
                        </div>

                        <h5 class="fw-bold text-dark mt-2 mb-1">{{ $story->beneficiary_name }}</h5>
                        <p class="text-uppercase text-secondary small fw-bold mb-3" style="font-size: 0.75rem; letter-spacing: 1px;">{{ $story->beneficiary_title ?? 'Beneficiary' }}</p>
                        
                        <p class="card-text text-muted" style="line-height: 1.7; font-size: 0.95rem;">
                            "{{ Str::limit($story->description, 150) }}"
                        </p>
                    </div>

                    <!-- Footer / Link -->
                    <div class="card-footer bg-white border-top-0 p-4 pt-0">
                        <a href="{{ route('success.stories.view', $story->id) }}" class="btn btn-outline-primary w-100 rounded-pill fw-bold text-uppercase small">
                            Read Full Story
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      @else
        <div class="col-12 text-center py-5">
             <div class="d-inline-block p-4 rounded-circle bg-light mb-3">
                 <i class="fa-solid fa-book-open display-4 text-secondary"></i>
             </div>
             <h3>Stories Coming Soon</h3>
             <p class="text-muted">We are gathering new success stories to share with you.</p>
        </div>
      @endif

    </div>
  </section>

  <style>
      .story-card-modern:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
      }
      .story-card-modern:hover img {
          transform: scale(1.05);
      }
  </style>
@endsection
