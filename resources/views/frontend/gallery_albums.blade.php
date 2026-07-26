@extends('main')

@section('content')

    <!-- ======= Photo Gallery Section ======= -->
    <section id="contact" class="contact bg-light p-0">
        <div class="container bg-white py-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Photo Gallery</h2>

                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('photo.all') }}" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="fa-solid fa-images me-2"></i> View All Photos
                    </a>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @forelse ($albums as $album)
                        <div class="col">
                            <a href="{{ route('gallery.album', ['album' => $album->name]) }}" class="text-decoration-none card-link-hover">
                                <div class="card h-100 border-0 shadow-lg overflow-hidden rounded-4 position-relative album-card">

                                    <div class="ratio ratio-4x3">
                                        @if(!empty($album->cover_image))
                                        <img src="{{ asset('images/gallery/'.$album->cover_image) }}" class="card-img-top object-fit-cover transition-transform" alt="{{ $album->name }}">
                                        @else
                                        <div class="bg-light d-flex align-items-center justify-content-center text-secondary">
                                            <i class="fa-regular fa-image fa-3x opacity-25"></i>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="card-img-overlay d-flex flex-column justify-content-end p-0">
                                        <div class="album-info p-4 text-white w-100" style="background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);">
                                            <h4 class="fw-bold mb-1 text-shadow">{{ $album->name }}</h4>
                                            <div class="d-flex align-items-center small text-white-50">
                                                <i class="fa-solid fa-camera me-2"></i> {{ $album->photo_count }} Photos
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 py-5 text-center">
                            <div class="d-inline-block p-4 bg-light rounded-circle mb-3">
                                <i class="fa-regular fa-images fa-3x text-secondary opacity-50"></i>
                            </div>
                            <h4 class="text-secondary fw-bold">No Albums Found</h4>
                            <p class="text-muted">We haven't uploaded any albums yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <style>
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.6); }
        .transition-transform { transition: transform 0.5s ease; }
        .album-card:hover .transition-transform { transform: scale(1.1); }
        .album-card:hover { transform: translateY(-5px); }
        .album-card { transition: transform 0.3s ease; }
    </style>

@endsection
