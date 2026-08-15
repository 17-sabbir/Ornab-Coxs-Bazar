@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-meta-text { color: #6B6258 !important; }
.uerd-read-more { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.uerd-read-more:hover { color: var(--brand-navy); text-decoration: underline; text-underline-offset: 4px; }
.bg-gradient-brand-overlay { background: rgba(18,43,107,0.55); transition: opacity 0.3s ease; }
.photo-card:hover .photo-info { opacity: 1 !important; }
.photo-card:hover .transition-transform { transform: scale(1.1); }
.photo-card:hover { transform: translateY(-5px); }
.photo-card { transition: transform 0.3s ease; }
.modal-backdrop.show { opacity: 0.8 !important; }
</style>

  <!-- ======= Modern Gradient Header ======= -->
  <div class="container pt-5 pb-3 text-center">
    <h1 class="display-3 fw-bold text-uppercase uerd-page-title">
        {{ $album }}
    </h1>
    <p class="lead uerd-meta-text mx-auto mt-2" style="max-width: 600px;">
        Explore the moments captured in this album.
    </p>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none uerd-meta-text">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('gallery.albums') }}" class="text-decoration-none uerd-meta-text">Gallery</a></li>
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
                    <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                        <div class="text-white bg-gradient-brand-overlay opacity-0 photo-info d-flex align-items-center justify-content-center" style="position: absolute; inset: 0;">
                            <i class="fa-solid fa-eye fa-2x"></i>
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
                <i class="fa-regular fa-image fa-3x uerd-meta-text opacity-50"></i>
            </div>
            <h4 class="uerd-meta-text fw-bold">No Photos Found</h4>
            <p class="uerd-meta-text">This album is currently empty.</p>
          </div>
        @endforelse
      </div>

    </div>
  </section>

@endsection
