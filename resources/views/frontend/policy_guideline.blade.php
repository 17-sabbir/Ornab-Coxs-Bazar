@extends('main')

@section('content')

  <!-- ======= Policy and Guideline Section ======= -->
  <section class="pg-hero" style="background: var(--brand-navy); padding: 46px 0 10px; text-align: center;">
    <div class="container">
      <h1 class="ornab-page-title" style="color: #fff; font-weight: 800; margin-bottom: .6rem;">Policy and Guideline</h1>
      <p class="ornab-body-text" style="color: rgba(255,255,255,0.8); max-width: 640px; margin: 0 auto; font-size: 1.05rem;">The frameworks that guide our accountability, safeguarding, and transparent operations.</p>
    </div>
  </section>

  <section class="pg-body" style="background: #fff; padding: 60px 0 80px;">
    <div class="container" data-aos="fade-up">
      @if(isset($policy) && count($policy) > 0)
      <div class="row">
        @foreach ($policy as $key => $data)
        <div class="col-12">
          <div class="ornab-list-row d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
            <div class="flex-grow-1">
              <h5 class="ornab-page-title mb-1">{{ $data->title }}</h5>
              @if(!empty($data->description))
                <p class="ornab-body-text mb-0" style="font-size: 0.85rem; color: #6B6258;">{{ Str::limit($data->description, 100) }}</p>
              @endif
            </div>
            <div class="flex-shrink-0">
              @if($data->download_allowed)
                <a href="{{ route('policy.download', $data->id) }}" class="ornab-download-link">
                  <i class="fa-solid fa-cloud-arrow-down me-1"></i> Download PDF
                </a>
              @else
                <span class="ornab-body-text" style="font-size: 0.85rem; color: #6B6258;">Download not available</span>
              @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @else
      <div class="text-center py-5">
        <i class="fa-solid fa-file-shield ornab-body-text" style="font-size: 3rem; color: #6B6258;"></i>
        <h4 class="ornab-page-title">No policies published yet.</h4>
      </div>
      @endif
    </div>
  </section>
  <!-- End Policy and Guideline Section -->

@endsection
