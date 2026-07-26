@extends('main')

@section('content')

  <!-- ======= Modern Gradient Header ======= -->
  <div class="container pt-5 pb-3 text-center">
    <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        {{ $album }}
    </h1>
    <p class="lead text-muted mx-auto mt-2" style="max-width: 600px;">
        Explore the moments captured in this album.
    </p>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('gallery.albums') }}" class="text-decoration-none text-muted">Gallery</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $album }}</li>
      </ol>
    </nav>
  </div>

  <section class="modern-container bg-white">
    <div class="container" data-aos="fade-up">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mb-5">
        @forelse ($photos as $data)
          <div class="col">
            <div class="card h-100 border-0 shadow-lg overflow-hidden rounded-4 photo-card">
              <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal{{ $data->id }}">
                <div class="ratio ratio-1x1">
                    <img src="{{ asset('images/gallery/'.$data->image) }}" class="card-img-top object-fit-cover transition-transform" alt="{{ $data->title }}">
                </div>
                <div class="card-img-overlay d-flex align-items-end p-0">
                    <div class="text-white p-3 w-100 bg-gradient-dark-overlay opacity-0 photo-info">
                        <small class="fw-bold">{{ $data->title }}</small>
                    </div>
                </div>
              </a>
            </div>

            <!-- Modal for this photo -->
            <div class="modal fade" id="photoModal{{ $data->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-header border-0">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0 text-center">
                            <img src="{{ asset('images/gallery/'.$data->image) }}" class="img-fluid rounded-3 shadow-lg" alt="{{ $data->title }}">
                            @if($data->title)
                            <div class="mt-2 text-white fw-bold">{{ $data->title }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

          </div>
        @empty
          <div class="col-12 py-5 text-center">
            <div class="d-inline-block p-4 bg-light rounded-circle mb-3">
                <i class="fa-regular fa-image fa-3x text-secondary opacity-50"></i>
            </div>
            <h4 class="text-secondary fw-bold">No Photos Found</h4>
            <p class="text-muted">This album is currently empty.</p>
          </div>
        @endforelse
      </div>

    </div>
  </section>

  <style>
      .bg-gradient-dark-overlay { background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); transition: opacity 0.3s ease; }
      .photo-card:hover .photo-info { opacity: 1 !important; }
      .transition-transform { transition: transform 0.5s ease; }
      .photo-card:hover .transition-transform { transform: scale(1.1); }
      .photo-card:hover { transform: translateY(-5px); }
      .photo-card { transition: transform 0.3s ease; }
      /* Modal adjustment */
      .modal-backdrop.show { opacity: 0.8 !important; }
  </style>

@endsection
