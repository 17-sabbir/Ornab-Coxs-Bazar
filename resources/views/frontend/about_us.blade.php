@extends('main')

@section('content')

    <!-- ======= Our Story (About Us) ======= -->
    <section class="au-hero2">
        <div class="container text-center">
            <p class="au-lead2">The journey, purpose and people behind Ornab Cox's Bazar.</p>
        </div>
    </section>

    <section class="au-body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    @if(!empty($about_us->about_us))
                    <div class="au-prose mb-4" data-aos="fade-up">
                        <h3 class="au-heading">About Ornab Cox's Bazar</h3>
                        <div class="au-text text-justify">{!! $about_us->about_us !!}</div>
                    </div>
                    @endif

                    @if(!empty($about_us->our_story))
                    <div class="au-prose mb-4" data-aos="fade-up">
                        <h3 class="au-heading">Our Story</h3>
                        <div class="au-text text-justify">{!! $about_us->our_story !!}</div>
                    </div>
                    @endif
{{-- 
                    @if(!empty($about_us->core_values))
                    <div class="mb-5">
                        <h3 class="au-heading text-center mb-4">Core Values</h3>
                        <div class="row g-3 justify-content-center">
                            @foreach(explode("\n", $about_us->core_values) as $line)
                                @if(trim($line))
                                    @php
                                        $cv = array_map('trim', explode('|', $line, 2));
                                        $cvName = $cv[0] ?? '';
                                        $cvDesc = $cv[1] ?? '';
                                    @endphp
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="au-value-card h-100">
                                            <div class="au-value-icon"><i class="fa-solid fa-gem"></i></div>
                                            <h6 class="au-value-title">{{ $cvName }}</h6>
                                            @if($cvDesc)<p class="au-value-text">{{ $cvDesc }}</p>@endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif --}}

                    @if(!empty($about_us->philosophy))
                    <div class="au-prose mb-4" data-aos="fade-up">
                        <h3 class="au-heading">Our Philosophy</h3>
                        <div class="au-text text-justify">{!! $about_us->philosophy !!}</div>
                    </div>
                    @endif

                </div>
            </div>

            @if(!empty($about_us->org_structure))
            <div class="au-prose mb-4" data-aos="fade-up">
                <h3 class="au-heading">Organizational Structure</h3>
                <div class="au-text text-justify">{!! $about_us->org_structure !!}</div>
            </div>
            @endif

            @if(isset($team) && count($team) > 0)
            <div class="row g-4 justify-content-center mt-2">
                <div class="col-12 text-center mb-2">
                    <h3 class="au-heading">Our Team</h3>
                </div>
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
            </div>
            @endif

        </div>
    </section>

    <style>
        .au-hero2 { background: linear-gradient(135deg, #e3f2fd, #e0f7fa); padding: 44px 0 30px; text-align: center; }
        .au-lead2 { color: #0b4a6f; font-size: 1.5rem; font-weight: 600; max-width: 760px; margin: 0 auto; line-height: 1.6; }
        .au-body { background: #fff; padding: 60px 0 80px; }
        .au-heading { font-weight: 700; color: #10372f; margin-bottom: 1.2rem; }
        .au-text { color: #4a5a55; line-height: 1.9; font-size: 1.02rem; }
        .au-text p { margin-bottom: 1rem; }
        .au-prose { background: #fff; border: 1px solid #eef1f0; border-left: 4px solid #0d9488; border-radius: 16px; padding: 2.4rem; box-shadow: 0 8px 26px rgba(16,55,47,.06); transition: transform .3s ease, box-shadow .3s ease; }
        .au-prose:hover { transform: translateY(-6px); box-shadow: 0 20px 44px rgba(13,148,136,.16); }
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
        .au-value-card { display: flex; align-items: center; gap: 1rem; background: #fff; border: 1px solid #eef1f0; border-left: 4px solid #0d9488; border-radius: 14px; padding: 1.2rem 1.4rem; box-shadow: 0 6px 20px rgba(16,55,47,.05); transition: transform .3s ease, box-shadow .3s ease; }
        .au-value-card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(13,148,136,.14); }
        .au-value-icon { width: 46px; height: 46px; flex: 0 0 auto; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: rgba(13,148,136,.1); color: #0d9488; font-size: 1.2rem; }
        .au-value-title { font-weight: 700; color: #10372f; margin: 0; font-size: 1rem; }
    </style>

@endsection
