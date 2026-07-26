@extends('main')

@section('content')

  <!-- ======= Modern Gradient Header ======= -->
  <div class="container pt-5 pb-3 text-center">
    <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Support Our Mission
    </h1>
    <p class="lead text-muted mx-auto mt-2" style="max-width: 600px;">
        Every contribution counts. Join hands with us to create a lasting impact.
    </p>
  </div>

  <!-- ======= Modern Fundraising Section ======= -->
  <section class="modern-container bg-white">
    <div class="container" data-aos="fade-up">

      <div class="row align-items-center justify-content-center">
          <div class="col-lg-10">
              
              <!-- Hero Card -->
              <div class="card border-0 shadow-lg overflow-hidden text-white rounded-5 position-relative" style="min-height: 500px;">
                  <!-- Background Image with Overlay -->
                  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('img/fund.jpg') }}'); background-size: cover; background-position: center; filter: brightness(0.6);"></div>
                  <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-to-t from-dark to-transparent opacity-50"></div>
                  
                  <div class="card-body position-relative z-1 d-flex flex-column justify-content-center align-items-center text-center p-5">
                      
                      <div class="mb-4">
                          <span class="badge bg-warning text-dark fw-bold px-3 py-2 rounded-pill mb-3 text-uppercase letter-spacing-1 shadow-lg pulse-animation">
                              <i class="fa-solid fa-hand-holding-heart me-2"></i> Join The Cause
                          </span>
                      </div>
                      
                      <h2 class="display-4 fw-bold mb-4 text-white text-shadow">
                          Together, Let's Create a <br> <span class="text-warning">Brighter Future</span>
                      </h2>
                      
                      <p class="lead text-light mb-5 mx-auto" style="max-width: 700px; text-shadow: 0 2px 4px rgba(0,0,0,0.5);">
                          Your support empowers communities, educates children, and builds sustainable livelihoods. Be the change you wish to see.
                      </p>
                      
                      <div class="d-flex gap-3 flex-wrap justify-content-center">
                          <a href="{{ route('donate') }}" class="btn btn-primary btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg hover-scale">
                              <i class="fa-solid fa-heart me-2"></i> Donate Now
                          </a>
                          <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3 fw-bold shadow-lg hover-scale backdrop-blur">
                              <i class="fa-solid fa-envelope me-2"></i> Contact Us
                          </a>
                      </div>

                  </div>
              </div>

          </div>
      </div>

    </div>
  </section>

  <style>
      .text-shadow { text-shadow: 0 4px 10px rgba(0,0,0,0.5); }
      .hover-scale { transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
      .hover-scale:hover { transform: scale(1.05); }
      .backdrop-blur { backdrop-filter: blur(5px); background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); }
      .bg-gradient-to-t { background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); }
      
      @keyframes pulse-custom {
          0% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.7); }
          70% { box-shadow: 0 0 0 10px rgba(255, 193, 7, 0); }
          100% { box-shadow: 0 0 0 0 rgba(255, 193, 7, 0); }
      }
      .pulse-animation { animation: pulse-custom 2s infinite; }
  </style>
@endsection
