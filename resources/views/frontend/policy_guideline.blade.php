@extends('main')

@section('content')

  <!-- ======= Policy and Guideline Section ======= -->
  <section class="pg-hero">
    <div class="container text-center">
      {{-- <span class="pg-eyebrow">Governance & Compliance</span> --}}
      <h1 class="pg-title">Policy and Guideline</h1>
      <p class="pg-lead">The frameworks that guide our accountability, safeguarding, and transparent operations.</p>
    </div>
  </section>

  <section class="pg-body">
    <div class="container" data-aos="fade-up">
      @if(isset($policy) && count($policy) > 0)
      <div class="row g-4 justify-content-center">
        @foreach ($policy as $key => $data)
        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($loop->iteration % 3) * 100 }}">
          <div class="pg-card h-100">
            <div class="pg-card-icon">
              <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <h5 class="pg-card-title">{{ $data->title }}</h5>
            @if(!empty($data->description))
              <p class="pg-card-text">{{ Str::limit($data->description, 110) }}</p>
            @endif
            @if($data->download_allowed)
            <a href="{{ route('policy.download', $data->id) }}" class="pg-card-btn">
              <i class="fa-solid fa-cloud-arrow-down me-2"></i> Download PDF
            </a>
            @else
            <span class="text-muted small">Download not available</span>
            @endif
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="text-center py-5">
        <i class="fa-solid fa-file-shield fa-3x text-muted mb-3"></i>
        <h4 class="text-secondary">No policies published yet.</h4>
      </div>
      @endif
    </div>
  </section>
  <!-- End Policy and Guideline Section -->

  <style>
    .pg-hero { background: linear-gradient(135deg, #e3f2fd, #e0f7fa); padding: 56px 0 40px; text-align: center; }
    .pg-eyebrow { display: inline-block; padding: .3rem .9rem; border-radius: 50px; background: rgba(13,148,136,.12); color: #0d9488; font-weight: 700; font-size: .8rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 1rem; }
    .pg-title { font-weight: 800; color: #10372f; margin-bottom: .6rem; }
    .pg-lead { color: #4a5a55; max-width: 640px; margin: 0 auto; font-size: 1.05rem; }
    .pg-body { background: #fff; padding: 60px 0 80px; }
    .pg-card { background: #fff; border: 1px solid #eef1f0; border-top: 4px solid #0d9488; border-radius: 16px; padding: 2rem 1.6rem; text-align: center; box-shadow: 0 8px 24px rgba(16,55,47,.06); transition: transform .3s ease, box-shadow .3s ease; display: flex; flex-direction: column; align-items: center; }
    .pg-card:hover { transform: translateY(-8px); box-shadow: 0 20px 45px rgba(13,148,136,.16); }
    .pg-card-icon { width: 64px; height: 64px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; color: #0d9488; background: rgba(13,148,136,.1); margin-bottom: 1.2rem; transition: transform .3s ease, background .3s ease, color .3s ease; }
    .pg-card:hover .pg-card-icon { transform: scale(1.1) rotate(-5deg); background: #0d9488; color: #fff; }
    .pg-card-title { font-weight: 700; color: #10372f; margin-bottom: .6rem; }
    .pg-card-text { color: #5b6b66; font-size: .92rem; line-height: 1.6; margin-bottom: 1.2rem; }
    .pg-card-btn { margin-top: auto; display: inline-block; padding: .55rem 1.2rem; border-radius: 50px; font-weight: 600; text-decoration: none; color: #10372f; background: rgba(13,148,136,.1); transition: background .25s ease, color .25s ease, transform .25s ease; }
    .pg-card-btn:hover { background: #0d9488; color: #fff; transform: translateY(-2px); }
  </style>

@endsection
