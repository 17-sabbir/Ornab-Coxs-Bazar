@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-meta-text { color: #6B6258 !important; }
.ornab-download-btn { background: var(--brand-coral); color: #fff; border: none; font-weight: 600; border-radius: 50px; padding: 10px 24px; display: inline-flex; align-items: center; gap: 8px; transition: all .3s ease; text-decoration: none; }
.ornab-download-btn:hover { background: #DF9B74; color: #fff; text-decoration: none; }
.ornab-disabled-btn { background: #e9ecef; color: #6c757d; border: none; font-weight: 600; border-radius: 50px; padding: 10px 24px; }
</style>

<!-- ======= Publication Section ======= -->
  <section id="publication" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2 class="ornab-page-title">Publications</h2>
        @if(isset($publications) && count($publications) > 0)
            <div class="row p-3">
                @foreach($publications as $publication)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($publication->thumbnail)
                            <img src="{{ asset('images/publications/thumbnails/'.$publication->thumbnail) }}" 
                                 class="card-img-top" 
                                 alt="{{ $publication->title }}" 
                                 style="height: 200px; object-fit: cover;">
                        @else
                             <div class="card-img-top d-flex align-items-center justify-content-center bg-light ornab-meta-text" 
                                  style="height: 200px;">
                                <i class="fa-solid fa-file-pdf fa-3x"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $publication->title }}</h5>
                            <p class="card-text flex-grow-1">{{ Str::limit($publication->description, 100) }}</p>
                            <div class="mt-auto">
                                @if($publication->pdf_file)
                                    <a href="{{ asset('images/publications/pdfs/'.$publication->pdf_file) }}" 
                                       target="_blank" 
                                       class="ornab-download-btn w-100" 
                                       style="font-size: 16px; font-weight:500;">
                                         <i class="fa-solid fa-cloud-arrow-down"></i> Download
                                     </a>
                                @else
                                    <button class="ornab-disabled-btn w-100" disabled>
                                        <i class="fa-solid fa-file-pdf"></i> No PDF Available
                                    </button>
                                @endif
                                <!-- <small class="text-muted d-block mt-2 text-center">
                                    Published: {{ date('M d, Y', strtotime($publication->created_at)) }}
                                </small> -->
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fa-solid fa-file-pdf fa-4x ornab-meta-text mb-3"></i>
                <p class="fs-4 ornab-meta-text">No publications available at the moment.</p>
                <p class="ornab-meta-text">Please check back later for new publications.</p>
            </div>
        @endif
      </div>
    </div>
  </section>
<!-- End Publication Section -->

@endsection
