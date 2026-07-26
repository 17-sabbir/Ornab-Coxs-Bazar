@extends('main')

@section('content')

  <!-- ======= Modern Gradient Header ======= -->
  <div class="container pt-5 pb-3 text-center">
    <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Career with Ornab Cox's Bazar
    </h1>
    <p class="lead text-muted mx-auto mt-2" style="max-width: 600px;">
        Join our team of dedicated professionals working to eliminate poverty and gender discrimination.
    </p>
  </div>

  <!-- ======= Interactive Career Section ======= -->
  <section class="modern-container bg-white">
    <div class="container" data-aos="fade-up">

      <div class="row g-5">
          <!-- Left Column: Content -->
          <div class="col-lg-7">
              <div class="pe-lg-4">
                  <div class="mb-5">
                      <h3 class="fw-bold text-dark border-start border-5 border-primary ps-3 mb-3">About Us</h3>
                      <p class="text-secondary lead text-justify">
                          <strong>Ornab Cox's Bazar</strong> is a non-government, non-profit, and non-political voluntary social development organization committed to community welfare, resilience, and sustainable development. 
                          We work together with disadvantaged communities to create sustainable change.
                      </p>
                  </div>

                  <div class="row g-4 mb-5">
                      <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light hover-lift">
                                <div class="card-body p-4">
                                    <div class="icon-circle bg-white text-primary shadow-sm mb-3">
                                        <i class="fa-solid fa-people-arrows fa-lg"></i>
                                    </div>
                                    <h5 class="fw-bold">Work Environment</h5>
                                    <p class="small text-muted mb-0">
                                        A structured, non-bureaucratic system where dignity, security, and gender balance are prioritized.
                                    </p>
                                </div>
                            </div>
                      </div>
                      <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm bg-light hover-lift">
                                <div class="card-body p-4">
                                    <div class="icon-circle bg-white text-success shadow-sm mb-3">
                                        <i class="fa-solid fa-users fa-lg"></i>
                                    </div>
                                    <h5 class="fw-bold">Staff Strength</h5>
                                    <p class="small text-muted mb-0">
                                        A dedicated team of full-time staff and volunteers responsible for impactful field activities.
                                    </p>
                                </div>
                            </div>
                      </div>
                  </div>

                  <div class="bg-primary bg-opacity-10 p-4 rounded-4 mb-4">
                      <h5 class="fw-bold text-dark mb-3"><i class="fa-regular fa-clock me-2"></i> Office Hours</h5>
                      <ul class="list-unstyled mb-0 text-dark">
                          <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Saturday to Thursday: 09:00 AM to 05:00 PM</li>
                          <li><i class="fa-solid fa-minus text-secondary me-2"></i> Friday: Weekly Holiday</li>
                      </ul>
                  </div>

              </div>
          </div>

          <!-- Right Column: Contact & Downloads -->
          <div class="col-lg-5">
              
              <!-- Contact Card -->
              <div class="card border-0 shadow-lg mb-5 bg-dark text-white overflow-hidden position-relative">
                  <div class="position-absolute top-0 end-0 bg-primary w-100 h-100 opacity-10" style="transform: skewX(-20deg) translateX(50%);"></div>
                  <div class="card-body p-5 position-relative z-1">
                      <h4 class="fw-bold mb-4">Recruitment Contact</h4>
                      <p class="mb-4 text-white-50">Please reach out to our head office for any recruitment inquiries.</p>
                      
                      @php $headOffice = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first(); @endphp
                      <div class="d-flex align-items-start mb-3">
                          <i class="fa-solid fa-map-location-dot mt-1 me-3 text-warning"></i>
                          <span>
                              <strong>Head Office:</strong><br>
                              {{ $headOffice->address ?? '' }}
                          </span>
                      </div>
                      <div class="d-flex align-items-center">
                          <i class="fa-solid fa-envelope me-3 text-warning"></i>
                          <span>{{ $headOffice->email ?? '' }}</span>
                      </div>
                  </div>
              </div>

               <!-- Downloads Section -->
               <h4 class="fw-bold text-dark mb-3">Available Downloads</h4>
               <div class="d-flex flex-column gap-3">
                    @foreach ($career as $key => $data)
                        <a href="{{ asset('images/invoked/'.$data->file) }}" target="_blank" class="download-link text-decoration-none">
                            <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center bg-white transition-all link-card">
                                <div class="rounded-circle bg-light p-3 me-3 d-flex align-items-center justify-content-center text-danger">
                                    <i class="fa-solid fa-file-pdf fs-4"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-1">{{ $data->name }}</h6>
                                    <small class="text-muted">Click to download file</small>
                                </div>
                                <div class="text-primary">
                                    <i class="fa-solid fa-cloud-arrow-down"></i>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @if(count($career) == 0)
                        <div class="alert alert-light border text-center">No active job circulars available.</div>
                    @endif
               </div>

          </div>
      </div>

    </div>
  </section>

  <style>
      .icon-circle {
          width: 50px;
          height: 50px;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
      }
      .hover-lift {
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .hover-lift:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
      }
      .link-card {
          transition: all 0.2s ease;
          border-left: 4px solid transparent !important;
      }
      .download-link:hover .link-card {
           transform: translateX(5px);
           border-left-color: var(--modern-primary) !important;
           background-color: #f8f9fa !important;
      }
  </style>
@endsection
