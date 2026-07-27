@extends('main')

@section('content')

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container" style="padding-top: 80px;">
    <div class="container" data-aos="fade-up">

      <div class="row align-items-center mb-5">
        <!-- Text Section - Left Side -->
        <div class="col-lg-5 mb-4 mb-lg-0 text-center text-lg-start" data-aos="fade-right">
            <h6 class="text-uppercase fw-bold letter-spacing-2 mb-2" style="color: #ff9800; letter-spacing: 2px;">Get in Touch</h6>
            <h1 class="display-4 fw-bold mb-3" style="background: linear-gradient(135deg, #009688 0%, #8bc34a 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Contact Ornab Cox's Bazar
            </h1>
            <p class="lead text-muted mb-4" style="font-size: 1.1rem;">
                Have questions or need assistance? We're here to help! Reach out to us through any of the channels below.
            </p>
            <div class="d-none d-lg-block">
                <i class="fa-solid fa-arrow-right-long fa-2x text-success opacity-50"></i>
            </div>
        </div>

        <!-- Cards Section - Right Side -->
        <div class="col-lg-7">
            <div class="row g-3 justify-content-center justify-content-lg-end">
                <!-- Head Office -->
                @if(isset($head_office))
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative contact-card h-100">
                        <!-- Colorful Top Border -->
                        <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%);"></div>
                        
                        <div class="card-body p-3 text-center d-flex flex-column align-items-center justify-content-center">
                            <div class="icon-wrapper mb-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; background: #e0f2f1; color: #00897b;">
                                <i class="fa-solid fa-building-columns fs-5"></i>
                            </div>
                            <h5 class="fw-bold mb-2 text-dark">{{ $head_office->title ? $head_office->title : 'Head Office' }}</h5>
                            
                            <div class="text-muted small mb-3 text-center px-2">
                                <i class="fa-solid fa-location-dot text-primary me-1"></i> {{ $head_office->address }}
                            </div>
                            
                            <div class="d-flex flex-column gap-1 w-100 border-top pt-2">
                                @if($head_office->mobile || $head_office->mobile2)
                                <a href="tel:{{ $head_office->mobile }}" class="text-decoration-none text-secondary hover-primary transition-color small">
                                    <i class="fa-solid fa-phone me-1 text-success"></i> {{ $head_office->mobile }}
                                </a>
                                @endif
                                @if($head_office->email || $head_office->email2)
                                <a href="mailto:{{ $head_office->email }}" class="text-decoration-none text-secondary hover-primary transition-color small">
                                    <i class="fa-solid fa-envelope me-1 text-warning"></i> {{ $head_office->email }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
        
                <!-- Branches Loop -->
                @if(isset($branches))
                    @foreach($branches as $branch)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative contact-card h-100">
                            <!-- Colorful Top Border -->
                            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #fce38a 0%, #f38181 100%);"></div>
                            
                            <div class="card-body p-3 text-center d-flex flex-column align-items-center justify-content-center">
                                <div class="icon-wrapper mb-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 50px; height: 50px; background: #fff3e0; color: #fb8c00;">
                                    <i class="fa-solid fa-map-location-dot fs-5"></i>
                                </div>
                                <h5 class="fw-bold mb-2 text-dark">{{ $branch->title ? $branch->title : 'Branch Office' }}</h5>
                                
                                <div class="text-muted small mb-3 text-center px-2">
                                    <i class="fa-solid fa-location-dot text-warning me-1"></i> {{ $branch->address }}
                                </div>
        
                                <div class="d-flex flex-column gap-1 w-100 border-top pt-2">
                                    @if($branch->mobile)
                                    <a href="tel:{{ $branch->mobile }}" class="text-decoration-none text-secondary hover-primary transition-color small">
                                        <i class="fa-solid fa-phone me-1 text-success"></i> {{ $branch->mobile }}
                                    </a>
                                    @endif
                                    @if($branch->email)
                                    <a href="mailto:{{ $branch->email }}" class="text-decoration-none text-secondary hover-primary transition-color small">
                                        <i class="fa-solid fa-envelope me-1 text-warning"></i> {{ $branch->email }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
      </div>
      
      <!-- Key Persons Section Title (New) -->
      @if(isset($persons) && count($persons) > 0)
      <div class="row mb-4 mt-5">
           <div class="col-12 text-center">
                <h3 class="fw-bold text-dark position-relative d-inline-block pb-2">
                    Key Persons
                    <span class="position-absolute bottom-0 start-50 translate-middle-x w-50" style="height: 3px; background: linear-gradient(90deg, #c471ed 0%, #f64f59 100%); border-radius: 2px;"></span>
                </h3>
           </div>
      </div>
      @endif


      <div class="row g-4 mb-5 justify-content-center">
        
         <!-- Key Persons Loop -->
         @if(isset($persons))
            @foreach($persons as $person)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden position-relative contact-card">
                    <!-- Colorful Top Border -->
                    <div class="position-absolute top-0 start-0 w-100" style="height: 6px; background: linear-gradient(90deg, #c471ed 0%, #f64f59 100%);"></div>

                    <div class="card-body p-4 pt-5 text-center">
                        <div class="icon-wrapper mb-4 mx-auto rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 70px; height: 70px; background: #f3e5f5; color: #8e24aa;">
                            <i class="fa-solid fa-user-tie fa-2x"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-dark">{{ $person->name }}</h4>
                        <span class="badge bg-light text-dark mb-3">{{ $person->title }}</span>
                        
                        <div class="d-flex flex-column gap-2 border-top pt-3 mt-3">
                            @if($person->mobile)
                            <a href="tel:{{ $person->mobile }}" class="text-decoration-none text-secondary hover-primary transition-color">
                                <i class="fa-solid fa-phone me-2 text-success"></i> {{ $person->mobile }}
                            </a>
                            @endif
                            @if($person->email)
                            <a href="mailto:{{ $person->email }}" class="text-decoration-none text-secondary hover-primary transition-color">
                                <i class="fa-solid fa-envelope me-2 text-warning"></i> {{ $person->email }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
      </div>

      <!-- Contact Form -->
      <div class="card border-0 shadow-xl rounded-5 overflow-hidden bg-white mt-5" data-aos="zoom-in">
        <div class="row g-0">
            <!-- Left Side Image/Gradient -->
            <div class="col-lg-5 d-none d-lg-block position-relative">
                <div class="h-100 w-100" style="background: url('https://images.unsplash.com/photo-1557426272-fc759fdf7a8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80') center/cover no-repeat;">
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(21, 131, 104, 0.9), rgba(13, 95, 73, 0.8));"></div>
                    <div class="position-relative text-white p-5 d-flex flex-column justify-content-center h-100">
                         <h3 class="fw-bold mb-4">Let's start a conversation</h3>
                         <p class="lead mb-4 opacity-75">We are interested in hearing your thoughts and answering your questions.</p>
                         <div class="d-flex flex-column gap-3 mt-4">
                             <div class="d-flex align-items-center gap-3">
                                 <div class="bg-white bg-opacity-25 rounded-circle p-2"><i class="fa-solid fa-envelope"></i></div>
                                 <span>info@ornabcxsbazar.org</span>
                             </div>
                             <div class="d-flex align-items-center gap-3">
                                 <div class="bg-white bg-opacity-25 rounded-circle p-2"><i class="fa-solid fa-phone"></i></div>
                                 <span>+880 1XXX-XXXXXX</span>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Side Form -->
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-left mb-4">
                        <span class="text-primary fw-bold text-uppercase small">Write to us</span>
                        <h2 class="fw-bold mt-1">Send a Message</h2>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success rounded-3 px-4 mb-4 border-0 bg-success bg-opacity-10 text-success">
                            <i class="fa-solid fa-check-circle me-2"></i> {{ session()->get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('message.store') }}" method="post" role="form">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label text-dark fw-bold small text-uppercase">Your Name</label>
                                    <input type="text" name="name" class="form-control form-control-lg bg-light border-0" id="name" placeholder="John Doe" value="{{ old('name') }}" required style="border-radius: 10px;">
                                    @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label text-dark fw-bold small text-uppercase">Your Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="sabbir@gmail.com" value="{{ old('email') }}" required style="border-radius: 10px;">
                                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="subject" class="form-label text-dark fw-bold small text-uppercase">Subject</label>
                                    <input type="text" name="subject" class="form-control form-control-lg bg-light border-0" id="subject" placeholder="How can we help?" value="{{ old('subject') }}" required style="border-radius: 10px;">
                                    @error('subject')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="form-label text-dark fw-bold small text-uppercase">Message</label>
                                    <button type="button" class="btn btn-link p-0 text-decoration-none float-end small">Guide?</button>
                                    <textarea class="form-control form-control-lg bg-light border-0" name="message" rows="5" placeholder="Tell us about your project or inquiry..." required style="border-radius: 10px;">{{ old('message') }}</textarea>
                                    @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                @if(config('recaptcha.enabled'))
                                    <div class="mb-3">
                                        {!! NoCaptcha::display() !!}
                                        @if($errors->has('g-recaptcha-response'))
                                            <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                                        @endif
                                    </div>
                                @endif
                                <button type="submit" class="btn w-100 py-3 fw-bold text-white shadow-lg" style="background: linear-gradient(90deg, #158368 0%, #0d5f49 100%); border-radius: 12px; transition: all 0.3s ease;">
                                    Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    
      <!-- Map Section -->
      <div class="card border-0 shadow-lg rounded-4 overflow-hidden mt-5 position-relative" data-aos="fade-up">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-white opacity-25" style="pointer-events: none;"></div>
            <iframe src="{{ application()->google_map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29711.083044610674!2d91.96255989655302!3d21.433749767245697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7266cb6de1d%3A0xbc13462b2ea76ec6!2sYasin%20Mansion!5e0!3m2!1sen!2sbd!4v1785163547013!5m2!1sen!2sbd' }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>
  </section>

  <style>
      .contact-card { transition: transform 0.3s ease, box-shadow 0.3s ease; }
      .contact-card:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.1) !important; }
      .form-control:focus { box-shadow: 0 0 0 3px rgba(21, 131, 104, 0.1); background: #fff; }
      .hover-primary:hover { color: #158368 !important; }
      .transition-color { transition: color 0.2s ease; }
  </style>

@endsection
