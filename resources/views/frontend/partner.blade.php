@extends('main')

@section('content')
  <!-- ======= Partner and Donor / Networks ======= -->
  <section class="pt-hero">
    <div class="container text-center">
      <span class="pt-eyebrow">Collaboration & Alliances</span>
      <h1 class="pt-title">Partner, Donor & Networks</h1>
      <p class="pt-lead">We work hand-in-hand with networks, donors, and partner organizations to amplify our impact.</p>
    </div>
  </section>

  <section class="pt-body">
    <div class="container" data-aos="fade-up">

      @php
        $networks = $partners->where('type', 'network');
        $others   = $partners->where('type', '!=', 'network');
      @endphp

      @if($networks->count())
      <div class="pt-group-label"><span>Networks & Memberships</span></div>
      <div class="row g-4 justify-content-center mb-5">
        @foreach($networks as $partner)
        <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
          <div class="pt-card h-100">
            <div class="pt-logo">
              @if($partner->logo)
                <img src="{{ asset('images/partners/'.$partner->logo) }}" alt="{{ $partner->name }}">
              @else
                <i class="fa-solid fa-handshake-angle"></i>
              @endif
            </div>
            <h6 class="pt-name">{{ $partner->name }}</h6>
            @if($partner->url)
              <a href="{{ $partner->url }}" target="_blank" class="pt-link">Visit <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i></a>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      @endif

      @if($others->count())
      <div class="pt-group-label"><span>Partners & Donors</span></div>
      <div class="row g-4 justify-content-center">
        @foreach($others as $partner)
        <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
          <div class="pt-card h-100">
            <div class="pt-logo">
              @if($partner->logo)
                <img src="{{ asset('images/partners/'.$partner->logo) }}" alt="{{ $partner->name }}">
              @else
                <i class="fa-solid fa-people-group"></i>
              @endif
            </div>
            <h6 class="pt-name">{{ $partner->name }}</h6>
            @if($partner->url)
              <a href="{{ $partner->url }}" target="_blank" class="pt-link">Visit <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i></a>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      @endif

      @if(!$partners || !count($partners))
      <div class="text-center py-5">
        <i class="fa-solid fa-handshake fa-3x text-muted mb-3"></i>
        <h4 class="text-secondary">No partners listed yet.</h4>
      </div>
      @endif

    </div>
  </section>
  <!-- End Partner and Donor -->

  <style>
    .pt-hero { background: linear-gradient(135deg, #e3f2fd, #e0f7fa); padding: 56px 0 40px; text-align: center; }
    .pt-eyebrow { display: inline-block; padding: .3rem .9rem; border-radius: 50px; background: rgba(13,148,136,.12); color: #0d9488; font-weight: 700; font-size: .8rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 1rem; }
    .pt-title { font-weight: 800; color: #10372f; margin-bottom: .6rem; }
    .pt-lead { color: #4a5a55; max-width: 640px; margin: 0 auto; font-size: 1.05rem; }
    .pt-body { background: #fff; padding: 60px 0 80px; }
    .pt-group-label { text-align: center; margin: 0 auto 2rem; max-width: 320px; position: relative; }
    .pt-group-label span { display: inline-block; padding: 0 1rem; background: #fff; position: relative; z-index: 1; font-weight: 700; color: #0d9488; text-transform: uppercase; letter-spacing: 1px; font-size: .85rem; }
    .pt-group-label::before { content: ''; position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: #e3e9e7; }
    .pt-card { background: #fff; border: 1px solid #eef1f0; border-radius: 16px; padding: 1.8rem 1.2rem; text-align: center; box-shadow: 0 8px 24px rgba(16,55,47,.06); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
    .pt-card:hover { transform: translateY(-8px); box-shadow: 0 20px 45px rgba(13,148,136,.16); border-color: #0d9488; }
    .pt-logo { width: 100%; height: 90px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
    .pt-logo img { max-height: 90px; max-width: 100%; object-fit: contain; }
    .pt-logo i { font-size: 2.6rem; color: #0d9488; }
    .pt-name { font-weight: 700; color: #10372f; margin-bottom: .4rem; font-size: .98rem; }
    .pt-link { font-size: .82rem; color: #0d9488; text-decoration: none; font-weight: 600; }
    .pt-link:hover { text-decoration: underline; }
  </style>

@endsection
