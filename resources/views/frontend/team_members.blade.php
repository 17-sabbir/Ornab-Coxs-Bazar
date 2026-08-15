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
.uerd-profile-fallback { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: var(--brand-teal); background: var(--brand-bg); }
.uerd-profile-overlay { position: absolute; inset: 0; display: flex; align-items: flex-end; justify-content: center; padding-bottom: 1rem; background: linear-gradient(to top, rgba(18,43,107,.75), transparent); opacity: 0; transition: opacity .3s ease; }
.uerd-profile-card:hover .uerd-profile-overlay { opacity: 1; }
.uerd-social { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; background: #fff; color: var(--brand-teal); font-size: .9rem; transition: transform .25s ease, background .25s ease, color .25s ease; }
.uerd-social:hover { transform: translateY(-3px); background: var(--brand-navy); color: #fff; }
.uerd-profile-body { padding: 1.4rem; text-align: center; }
.uerd-profile-body h5 { font-weight: 700; color: var(--brand-navy); margin-bottom: .4rem; }
.uerd-profile-body p { color: var(--brand-text); opacity: 0.7; font-size: .92rem; margin-bottom: .5rem; }
.uerd-badge { display: inline-block; font-size: .78rem; font-weight: 600; color: var(--brand-teal); background: rgba(79,168,201,.10); padding: .3rem .9rem; border-radius: 50px; }
.uerd-hero { background: var(--brand-navy); color: #fff; padding: 44px 0 30px; text-align: center; }
</style>

    <!-- ======= Team Members (About Us) ======= -->
    <section class="uerd-hero">
        <div class="container text-center">
            <p class="lead mb-0 text-white">Dedicated professionals working together to create lasting impact.</p>
        </div>
    </section>

    <section class="py-5" style="background: #fff;">
        <div class="container">
            <div class="row g-4 justify-content-center">
                @if(isset($team) && count($team) > 0)
                    @foreach($team as $member)
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="zoom-in" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="uerd-profile-card h-100">
                            <div class="uerd-profile-img">
                                @if($member->photo)
                                    <img src="{{ asset('images/team_members/'.$member->photo) }}" alt="{{ $member->name }}">
                                @else
                                    <div class="uerd-profile-fallback"><i class="fa-solid fa-user"></i></div>
                                @endif
                                <div class="uerd-profile-overlay">
                                    <div class="d-flex gap-2 justify-content-center">
                                        @if(isset($member->facebook) && $member->facebook)
                                            <a href="{{ $member->facebook }}" target="_blank" class="uerd-social"><i class="fa-brands fa-facebook-f"></i></a>
                                        @endif
                                        @if(isset($member->twitter) && $member->twitter)
                                            <a href="{{ $member->twitter }}" target="_blank" class="uerd-social"><i class="fa-brands fa-twitter"></i></a>
                                        @endif
                                        @if(isset($member->instagram) && $member->instagram)
                                            <a href="{{ $member->instagram }}" target="_blank" class="uerd-social"><i class="fa-brands fa-instagram"></i></a>
                                        @endif
                                        @if(isset($member->youtube) && $member->youtube)
                                            <a href="{{ $member->youtube }}" target="_blank" class="uerd-social"><i class="fa-brands fa-youtube"></i></a>
                                        @endif
                                        @if(isset($member->linkedin) && $member->linkedin)
                                            <a href="{{ $member->linkedin }}" target="_blank" class="uerd-social"><i class="fa-brands fa-linkedin-in"></i></a>
                                        @endif
                                        @if(isset($member->email) && $member->email)
                                            <a href="mailto:{{ $member->email }}" class="uerd-social"><i class="fa-solid fa-envelope"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="uerd-profile-body">
                                <h5 class="uerd-page-title">{{ $member->name }}</h5>
                                <span class="uerd-badge">{{ $member->designation ?? 'Team Member' }}</span>
                                @if($member->department)
                                    <p class="uerd-role-text mb-0">{{ $member->department }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <p class="uerd-body-text fs-5">No active team members found.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
