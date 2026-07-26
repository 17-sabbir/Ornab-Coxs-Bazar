@extends('main')

@section('content')

    <!-- ======= Team Members (About Us) ======= -->
    <section class="au-hero2">
        <div class="container text-center">
            <p class="au-lead2">Dedicated professionals working together to create lasting impact.</p>
        </div>
    </section>

    <section class="au-body">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @if(isset($team) && count($team) > 0)
                    @foreach($team as $member)
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="au-profile h-100">
                            <div class="au-profile-img">
                                @if($member->photo)
                                    <img src="{{ asset('images/team_members/'.$member->photo) }}" alt="{{ $member->name }}">
                                @else
                                    <div class="au-profile-fallback"><i class="fa-solid fa-user"></i></div>
                                @endif
                                <div class="au-profile-overlay">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @if(isset($member->facebook) && $member->facebook)
                                            <a href="{{ $member->facebook }}" target="_blank" class="au-social"><i class="fa-brands fa-facebook-f"></i></a>
                                        @endif
                                        @if(isset($member->twitter) && $member->twitter)
                                            <a href="{{ $member->twitter }}" target="_blank" class="au-social"><i class="fa-brands fa-twitter"></i></a>
                                        @endif
                                        @if(isset($member->instagram) && $member->instagram)
                                            <a href="{{ $member->instagram }}" target="_blank" class="au-social"><i class="fa-brands fa-instagram"></i></a>
                                        @endif
                                        @if(isset($member->youtube) && $member->youtube)
                                            <a href="{{ $member->youtube }}" target="_blank" class="au-social"><i class="fa-brands fa-youtube"></i></a>
                                        @endif
                                        @if(isset($member->linkedin) && $member->linkedin)
                                            <a href="{{ $member->linkedin }}" target="_blank" class="au-social"><i class="fa-brands fa-linkedin-in"></i></a>
                                        @endif
                                        @if(isset($member->email) && $member->email)
                                            <a href="mailto:{{ $member->email }}" class="au-social"><i class="fa-solid fa-envelope"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="au-profile-body">
                                <h5>{{ $member->name }}</h5>
                                <span class="au-badge">{{ $member->designation ?? 'Team Member' }}</span>
                                @if($member->department)
                                    <p class="mb-0">{{ $member->department }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="text-muted fs-5">No active team members found.</p>
                    </div>
                @endif
            </div>
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
        .au-profile-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: #0d9488; background: linear-gradient(135deg, #eafaf5, #d3f0e8); }
        .au-profile-overlay { position: absolute; inset: 0; display: flex; align-items: flex-end; justify-content: center; padding-bottom: 1rem; background: linear-gradient(to top, rgba(13,148,136,.88), transparent); opacity: 0; transition: opacity .3s ease; }
        .au-profile:hover .au-profile-overlay { opacity: 1; }
        .au-social { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #fff; color: #0d9488; font-size: .9rem; transition: transform .25s ease, background .25s ease, color .25s ease; }
        .au-social:hover { transform: translateY(-3px); background: #10372f; color: #fff; }
        .au-profile-body { padding: 1.4rem; text-align: center; }
        .au-profile-body h5 { font-weight: 700; color: #10372f; margin-bottom: .4rem; }
        .au-profile-body p { color: #5b6b66; font-size: .92rem; margin-bottom: .5rem; }
        .au-badge { display: inline-block; font-size: .78rem; font-weight: 600; color: #0d9488; background: rgba(13,148,136,.1); padding: .3rem .9rem; border-radius: 50px; }
    </style>

@endsection
