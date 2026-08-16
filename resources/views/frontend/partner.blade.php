@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-hero { background: var(--brand-navy); color: #fff; padding: 56px 0 40px; text-align: center; }
.ornab-hero-title { font-weight: 800; color: #fff; margin-bottom: .6rem; }
.ornab-hero-lead { color: rgba(255,255,255,.8); max-width: 640px; margin: 0 auto; font-size: 1.05rem; }
.ornab-body { background: #fff; padding: 60px 0 80px; }
.ornab-group-label { text-align: center; margin: 0 auto 2rem; max-width: 320px; position: relative; }
.ornab-group-label span { display: inline-block; padding: 0 1rem; background: #fff; position: relative; z-index: 1; font-weight: 700; color: var(--brand-teal); text-transform: uppercase; letter-spacing: 1px; font-size: .85rem; }
.ornab-group-label::before { content: ''; position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: var(--brand-border); }
.ornab-partner-card { background: #fff; border: 1px solid var(--brand-border); border-radius: 16px; padding: 1.8rem 1.2rem; text-align: center; box-shadow: 0 4px 12px rgba(18,43,107,.06); transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease; }
.ornab-partner-card:hover { transform: translateY(-6px); box-shadow: 0 12px 28px rgba(18,43,107,.10); border-color: var(--brand-teal); }
.ornab-partner-logo { width: 100%; height: 90px; display: flex; align-items: center; justify-content: center; margin-bottom: 1rem; }
.ornab-partner-logo img { max-height: 90px; max-width: 100%; object-fit: contain; }
.ornab-partner-name { font-weight: 700; color: var(--brand-navy); margin-bottom: .4rem; font-size: .98rem; }
</style>

  <!-- ======= Partner and Donor / Networks ======= -->
  <section class="ornab-hero">
    <div class="container text-center">
      <h1 class="ornab-hero-title">Partner, Donor & Networks</h1>
      <p class="ornab-hero-lead">We work hand-in-hand with networks, donors, and partner organizations to amplify our impact.</p>
    </div>
  </section>

  <section class="ornab-body">
    <div class="container" data-aos="fade-up">

      @if($partners->count())
      <div class="ornab-group-label"><span>Partners & Donors</span></div>
      <div class="row g-4 justify-content-center">
        @foreach($partners as $partner)
        <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
          <div class="ornab-partner-card h-100">
            <div class="ornab-partner-logo">
              @if($partner->logo)
                <img src="{{ asset('images/partner/'.$partner->logo) }}" alt="{{ $partner->name }}">
              @else
                <i class="fa-solid fa-people-group" style="font-size: 2.6rem; color: var(--brand-teal);"></i>
              @endif
            </div>
            <h6 class="ornab-partner-name">{{ $partner->name }}</h6>
          </div>
        </div>
        @endforeach
      </div>
      @endif

      @if(!$partners || !count($partners))
      <div class="text-center py-5">
        <i class="fa-solid fa-handshake fa-3x ornab-body-text mb-3" style="color: #6B6258;"></i>
        <h4 class="ornab-page-title">No partners listed yet.</h4>
      </div>
      @endif

    </div>
  </section>
  <!-- End Partner and Donor -->

@endsection
