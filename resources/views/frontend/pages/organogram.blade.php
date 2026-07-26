@extends('main')

@section('title', 'Organogram - Ornab Cox\'s Bazar')

@section('content')
  <!-- ======= Modern Breadcrumbs ======= -->
  <section class="modern-breadcrumbs">
    <div class="container text-center">
      <h2>Organogram</h2>
      <ol class="d-inline-flex justify-content-center">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li class="current">Organogram</li>
      </ol>
    </div>
  </section>

  <!-- ======= Modern Content Section ======= -->
  <section class="modern-container" style="background-color: #f9f9f9; padding-bottom: 50px;">
    <div class="container" data-aos="fade-up">
        
        <div class="row justify-content-center mt-4">
            <div class="col-lg-10">
                <div class="card shadow-lg border-0 rounded overflow-hidden" style="background-color: #fff; padding: 2rem;">
                    <div class="card-body p-0 text-center">
                        @if($organogram && $organogram->file_path)
                            @php 
                                $ext = strtolower(pathinfo($organogram->file_path, PATHINFO_EXTENSION));
                            @endphp

                            @if($ext == 'pdf')
                                <!-- Show PDF in embedded viewer with fallback option -->
                                <object data="{{ asset($organogram->file_path) }}" type="application/pdf" width="100%" height="800px" style="border: 1px solid #eaeaea;">
                                    <p>The organizational structure is outlined <a href="{{ asset($organogram->file_path) }}"> below</a></p>
                                </object>
                                <div class="mt-4">
                                     <a href="{{ asset($organogram->file_path) }}" target="_blank" class="btn btn-outline-danger btn-lg px-5 rounded-pill"><i class="fa-solid fa-file-pdf me-2"></i> View/Download Full PDF</a>
                                </div>
                            @elseif(in_array($ext, ['jpg', 'jpeg', 'png']))
                                <!-- Show Image using Fancybox for ultra-smooth zoom & panning -->
                                <a href="{{ asset($organogram->file_path) }}" data-fancybox="organogram" data-caption="Organogram" class="position-relative d-block" style="cursor: zoom-in; overflow: hidden;">
                                    <img src="{{ asset($organogram->file_path) }}" alt="Organogram" class="img-fluid rounded" style="max-height: 80vh; object-fit: contain; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                                    <div class="position-absolute top-0 end-0 p-3" style="pointer-events: none;">
                                        <span class="badge bg-dark rounded-pill px-3 py-2 opacity-75"><i class="fa-solid fa-magnifying-glass-plus me-1"></i> Click to view & zoom</span>
                                    </div>
                                </a>
                            @else
                                <div class="alert alert-warning h4 fw-light py-4 text-center">Supported representation not found. Download file below.</div>
                                <a href="{{ asset($organogram->file_path) }}" target="_blank" class="btn btn-outline-dark btn-lg mt-3">Download Organogram</a>
                            @endif

                        @else
                            <div class="py-5 bg-white text-muted">
                                <i class="fa-solid fa-image-portrait fa-4x mb-3 text-light"></i>
                                <h3 class="fw-light">Organogram is not available at the moment.</h3>
                                <p class="text-secondary mt-2">Please check back later.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
  </section>
@endsection

@push('css')
    <!-- Fancybox CSS for Lightbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
@endpush

@push('js')
    <!-- Fancybox JS for super smooth zooming and panning -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        Fancybox.bind('[data-fancybox="organogram"]', {
            // Optional customized features
            compact: false,
            idle: false,
            animated: false,
            showClass: false,
            hideClass: false,
            dragToClose: false,
            Toolbar: {
                display: {
                    left: ["infobar"],
                    middle: [
                        "zoomIn",
                        "zoomOut",
                        "toggle1to1",
                        "rotateCCW",
                        "rotateCW",
                    ],
                    right: ["close"],
                },
            },
        });
    </script>
@endpush
