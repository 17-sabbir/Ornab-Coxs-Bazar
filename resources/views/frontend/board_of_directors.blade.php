@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-body-text { color: var(--brand-text) !important; }
.uerd-role-text { color: var(--brand-teal); font-size: 0.85rem; font-weight: 600; }
.uerd-profile-card { background: #fff; border: 1px solid var(--brand-border); border-radius: 18px; overflow: hidden; box-shadow: 0 4px 12px rgba(18,43,107,.06); transition: transform .3s ease, box-shadow .3s ease; }
.uerd-profile-card:hover { transform: translateY(-6px); box-shadow: 0 12px 28px rgba(18,43,107,.10); }
.uerd-profile-img { position: relative; height: 230px; overflow: hidden; background: var(--brand-bg); }
.uerd-profile-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
.uerd-profile-card:hover .uerd-profile-img img { transform: scale(1.08); }
.uerd-profile-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; font-weight: 700; background: var(--brand-teal); color: #fff; }
.uerd-profile-body { padding: 1.6rem; text-align: center; }
.uerd-profile-body h4 { font-weight: 700; color: var(--brand-navy); margin-bottom: .4rem; }
.uerd-bio { color: var(--brand-text); opacity: 0.7; line-height: 1.7; text-align: justify; }
.uerd-hero { background: var(--brand-navy); color: #fff; padding: 44px 0 30px; text-align: center; }
</style>

    <!-- ======= Board of Directors (About Us) ======= -->
    <section class="uerd-hero">
        <div class="container text-center">
            <p class="lead mb-0 text-white">The leadership guiding our mission and vision forward.</p>
        </div>
    </section>

    <section class="py-5" style="background: #fff;">
        <div class="container">
            @if($directors->count() > 0)
                <div class="row g-4">
                    @foreach($directors as $director)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="uerd-profile-card h-100">
                                <div class="uerd-profile-img">
                                    @if($director->image)
                                        <img src="{{ asset('images/board_of_directors/'.$director->image) }}" alt="{{ $director->name }}">
                                    @else
                                        <div class="uerd-profile-fallback">{{ strtoupper(substr($director->name, 0, 1)) }}</div>
                                    @endif
                                </div>
                                <div class="uerd-profile-body">
                                    <h4 class="uerd-page-title">{{ $director->name }}</h4>
                                    <p class="uerd-role-text mb-3">{{ $director->designation }}</p>
                                    @if($director->bio)
                                        <p class="small uerd-bio">{{ Str::limit($director->bio, 200) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <h4 class="uerd-page-title">No data available.</h4>
                </div>
            @endif
        </div>
    </section>

@endsection
