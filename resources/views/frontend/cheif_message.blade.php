@extends('main')

@section('content')

  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
            <h2>Message from Executive Director</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
                <li class="current">Executive Director Message</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section: Editorial Layout ======= -->
  <section class="modern-container" style="background-color: #fcefe9;">
    <div class="container" data-aos="fade-up">

        @if(isset($message))
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-11">
                <div class="card border-0 shadow-lg overflow-hidden rounded-3" style="min-height: 600px;">
                    <div class="row g-0 h-100">
                        <!-- Image Side (Cover style on large screens) -->
                        <div class="col-lg-5 position-relative bg-dark">
                            @if($message->photo)
                                <img src="{{ asset('images/chief_message/'.$message->photo) }}" class="img-fluid w-100 h-100" style="object-fit: cover; opacity: 0.9;" alt="{{ $message->name }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary">
                                    <i class="fa-solid fa-user fa-5x text-white opacity-50"></i>
                                </div>
                            @endif
                            <!-- Overlay Gradient -->
                            <div class="position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                <h3 class="text-white fw-bold mb-0">{{ $message->name }}</h3>
                                <p class="text-white-50 mb-0 small text-uppercase letter-spacing-2">{{ $message->designation }}</p>
                            </div>
                        </div>

                        <!-- Text Side -->
                        <div class="col-lg-7 bg-white p-5 d-flex flex-column justify-content-center position-relative">
                             <!-- Watermark -->
                             <div class="position-absolute top-0 end-0 p-4 opacity-10">
                                 <i class="fa-solid fa-feather-pointed fa-4x text-dark"></i>
                             </div>

                             <span class="d-block text-danger fw-bold text-uppercase small mb-2 letter-spacing-1">From the Desk of the Executive Director</span>
                             <h2 class="display-6 fw-bold text-dark mb-4">A Vision for Tomorrow</h2>

                             <div class="position-relative ps-4 border-start border-2 border-danger">
                                 <p class="text-muted" style="font-family: 'Georgia', serif; font-size: 1.15rem; line-height: 1.8;">
                                    {!! nl2br(e($message->message)) !!}
                                 </p>
                             </div>

                             @if($message->signature)
                                <div class="mt-5 border-top pt-3 d-inline-block" style="max-width: 250px;">
                                    <img src="{{ asset('images/chief_message/'.$message->signature) }}" alt="Signature" class="img-fluid" style="filter: contrast(1.2);">
                                </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col-12 text-center py-5">
             <div class="modern-card">
                 <i class="fa-solid fa-envelope-open-text display-4 text-muted mb-3 opacity-50"></i>
                 <h3>Message Coming Soon</h3>
                 <p class="text-muted">The Executive Director's message is currently being updated.</p>
             </div>
        </div>
        @endif

    </div>
  </section>
@endsection
