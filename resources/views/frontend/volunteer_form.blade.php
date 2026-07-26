@extends('main')

@section('content')

  <section class="modern-container" style="padding-top: 80px;">
    <div class="container" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center mb-4">
            <h6 class="text-uppercase fw-bold mb-2" style="color: #ff9800; letter-spacing: 2px;">Get Involved</h6>
            <h1 class="display-5 fw-bold mb-3" style="background: linear-gradient(135deg, #009688 0%, #8bc34a 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Become a Volunteer
            </h1>
            <p class="lead text-muted">
                Join Ornab Cox's Bazar and help us build stronger, more resilient communities. Fill in the form below and our team will reach out to you.
            </p>
          </div>

          <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
            <div class="card-body p-4 p-md-5">
              @if (session()->has('success'))
                <div class="alert alert-success rounded-3 px-4 mb-4 border-0 bg-success bg-opacity-10 text-success">
                  <i class="fa-solid fa-check-circle me-2"></i> {{ session()->get('success') }}
                </div>
              @endif

              <form action="{{ route('volunteer.submit') }}" method="post" role="form">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="name" class="form-label text-dark fw-bold small text-uppercase">Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg bg-light border-0" id="name" placeholder="Your name" value="{{ old('name') }}" required style="border-radius: 10px;">
                    @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>
                  <div class="col-md-6">
                    <label for="phone" class="form-label text-dark fw-bold small text-uppercase">Phone</label>
                    <input type="text" name="phone" class="form-control form-control-lg bg-light border-0" id="phone" placeholder="+880 1XXX-XXXXXX" value="{{ old('phone') }}" required style="border-radius: 10px;">
                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>
                  <div class="col-md-6">
                    <label for="email" class="form-label text-dark fw-bold small text-uppercase">Email</label>
                    <input type="email" name="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="you@example.com" value="{{ old('email') }}" required style="border-radius: 10px;">
                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>
                  <div class="col-md-6">
                    <label for="location" class="form-label text-dark fw-bold small text-uppercase">Location</label>
                    <input type="text" name="location" class="form-control form-control-lg bg-light border-0" id="location" placeholder="District / Upazila" value="{{ old('location') }}" style="border-radius: 10px;">
                    @error('location')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>
                  <div class="col-12">
                    <label for="interest" class="form-label text-dark fw-bold small text-uppercase">Area of Interest</label>
                    <select name="interest" class="form-select form-control-lg bg-light border-0" id="interest" style="border-radius: 10px;">
                      <option value="">Select an area</option>
                      @foreach($interests as $interest)
                        <option value="{{ $interest }}" {{ old('interest') == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                      @endforeach
                    </select>
                    @error('interest')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>
                  <div class="col-12">
                    <label for="message" class="form-label text-dark fw-bold small text-uppercase">Why do you want to volunteer? (optional)</label>
                    <textarea name="message" class="form-control form-control-lg bg-light border-0" id="message" rows="4" placeholder="Tell us a little about yourself..." style="border-radius: 10px;">{{ old('message') }}</textarea>
                    @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                  </div>

                  <div class="col-12 mt-2">
                    @if(config('recaptcha.enabled'))
                      <div class="mb-3">
                        {!! NoCaptcha::display() !!}
                        @if($errors->has('g-recaptcha-response'))
                          <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                      </div>
                    @endif
                    <button type="submit" class="btn w-100 py-3 fw-bold text-white shadow-lg" style="background: linear-gradient(90deg, #158368 0%, #0d5f49 100%); border-radius: 12px;">
                      Submit Application <i class="fa-solid fa-paper-plane ms-2"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="text-center mt-4">
            <a href="{{ route('volunterr.opportunities') }}" class="btn btn-outline-success rounded-pill px-4">
              <i class="fa-solid fa-arrow-left me-2"></i> View Open Opportunities
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    .form-control:focus, .form-select:focus { box-shadow: 0 0 0 3px rgba(21, 131, 104, 0.1); background: #fff; }
  </style>

@endsection
