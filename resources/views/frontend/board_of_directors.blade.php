@extends('main')

@section('content')

    <!-- ======= Board of Directors (About Us) ======= -->
    <section class="au-hero2">
        <div class="container text-center">
            <p class="au-lead2">The leadership guiding our mission and vision forward.</p>
        </div>
    </section>

    <section class="au-body">
        <div class="container">
            @if($directors->count() > 0)
                <div class="row g-4">
                    @foreach($directors as $director)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="au-profile h-100">
                                <div class="au-profile-img">
                                    @if($director->image)
                                        <img src="{{ asset('images/board_of_directors/'.$director->image) }}" alt="{{ $director->name }}">
                                    @else
                                        <div class="au-profile-fallback" style="background: linear-gradient(135deg, #0d9488, #0d5f49); color: #fff;">{{ strtoupper(substr($director->name, 0, 1)) }}</div>
                                    @endif
                                </div>
                                <div class="au-profile-body">
                                    <h4>{{ $director->name }}</h4>
                                    <p class="text-muted mb-3">{{ $director->designation }}</p>
                                    @if($director->bio)
                                        <p class="small au-bio">{{ Str::limit($director->bio, 200) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <h4>No data available.</h4>
                </div>
            @endif
        </div>
    </section>

    <style>
        .au-hero2 { background: linear-gradient(135deg, #e3f2fd, #e0f7fa); padding: 44px 0 30px; text-align: center; }
        .au-lead2 { color: #0b4a6f; font-size: 1.5rem; font-weight: 600; max-width: 760px; margin: 0 auto; line-height: 1.6; }
        .au-body { background: #fff; padding: 60px 0 80px; }
        .au-profile { border: 1px solid #eef1f0; border-radius: 18px; overflow: hidden; background: #fff; box-shadow: 0 8px 24px rgba(16,55,47,.06); transition: transform .3s ease, box-shadow .3s ease; }
        .au-profile:hover { transform: translateY(-10px); box-shadow: 0 22px 45px rgba(13,148,136,.18); }
        .au-profile-img { position: relative; height: 230px; overflow: hidden; background: #eef1f0; }
        .au-profile-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
        .au-profile:hover .au-profile-img img { transform: scale(1.08); }
        .au-profile-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; font-weight: 700; }
        .au-profile-body { padding: 1.6rem; text-align: center; }
        .au-profile-body h4 { font-weight: 700; color: #10372f; margin-bottom: .4rem; }
        .au-bio { color: #4a5a55; line-height: 1.7; text-align: justify; }
    </style>

@endsection
