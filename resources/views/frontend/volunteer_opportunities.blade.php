@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-body-text { color: var(--brand-text) !important; }
.ornab-contact-icon { background: var(--brand-teal) !important; color: #fff !important; }
.ornab-submit-btn { background: var(--brand-navy); color: #fff; border: none; font-weight: 700; border-radius: 12px; padding: 14px 32px; transition: all .3s ease; }
.ornab-submit-btn:hover { background: var(--brand-teal); color: #fff; }
.ornab-success-msg { background: rgba(76,122,61,.08); color: var(--brand-green); border: 1px solid rgba(76,122,61,.15); }
.ornab-form-control:focus { border-color: var(--brand-teal) !important; box-shadow: 0 0 0 0.25rem rgba(79,168,201,.25) !important; }
</style>

<!-- ======= Volunteer Info Sections ======= -->
<section class="py-5" style="background: var(--brand-bg);">
    <div class="container">
        @if($volunteerInfo)
            @php
                $sections = [
                    ['title' => 'What You Can Do', 'content' => $volunteerInfo->what_you_can_do, 'icon' => 'fa-hands-helping', 'color' => 'var(--brand-teal)'],
                    ['title' => 'Eligibility & Commitment', 'content' => $volunteerInfo->eligibility, 'icon' => 'fa-clipboard-check', 'color' => 'var(--brand-green)'],
                    ['title' => 'Benefits', 'content' => $volunteerInfo->benefits, 'icon' => 'fa-gift', 'color' => 'var(--brand-coral)'],
                ];
            @endphp

            @foreach($sections as $index => $section)
                @if(!empty(trim($section['content'])))
                <div class="row align-items-center g-5 mb-5 {{ $index % 2 == 1 ? 'flex-lg-row-reverse' : '' }}">
                    <div class="col-lg-7">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: {{ $section['color'] }}; color: #fff; flex: 0 0 auto;">
                                <i class="fa-solid {{ $section['icon'] }}"></i>
                            </div>
                             <h2 class="fw-bold mb-0 ornab-page-title">{{ $section['title'] }}</h2>
                        </div>
                        <div class="ornab-body-text" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                            {!! $section['content'] !!}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--brand-bg), #fff); min-height: 280px;">
                            <i class="fa-solid {{ $section['icon'] }}" style="font-size: 5rem; color: {{ $section['color'] }}; opacity: .35;"></i>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @else
            <div class="text-center py-5">
                <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center mx-auto" style="background: linear-gradient(135deg, var(--brand-bg), #fff); max-width: 500px; min-height: 300px;">
                    <div>
                        <i class="fa-solid fa-hand-holding-heart" style="font-size: 5rem; color: var(--brand-teal); opacity: .35;"></i>
                        <h3 class="mt-3 ornab-page-title">Volunteer Information Coming Soon</h3>
                        <p class="ornab-body-text">We are updating our volunteer information. Please check back later.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- ======= Volunteer Application Form ======= -->
<section id="apply-form" class="py-5" style="background: #fff;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <h2 class="fw-bold ornab-page-title">Become a Volunteer</h2>
                    <p class="ornab-body-text">Fill out the form below and our team will contact you soon.</p>
                </div>

                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">
                        @if(session('success'))
                            <div class="alert ornab-success-msg rounded-3 px-4 mb-4 border-0">
                                <i class="fa-solid fa-check-circle me-2"></i> {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('volunteer.submit') }}" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label fw-bold small text-uppercase">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your full name" value="{{ old('name') }}" required>
                                    @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-bold small text-uppercase">Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="+880 1XXX-XXXXXX" value="{{ old('phone') }}" required>
                                    @error('phone')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold small text-uppercase">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                                    @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label fw-bold small text-uppercase">Address</label>
                                    <input type="text" name="location" class="form-control" id="location" placeholder="District / Upazila" value="{{ old('location') }}">
                                    @error('location')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="interest" class="form-label fw-bold small text-uppercase">Area of Interest <span class="text-danger">*</span></label>
                                    <select name="interest" class="form-select" id="interest" required>
                                        <option value="">Select an area</option>
                                        @php
                                            $interests = [
                                                'Education & Training',
                                                'Health & Nutrition',
                                                'Women Empowerment',
                                                'Disaster Response',
                                                'Community Mobilization',
                                                'Fundraising & Events',
                                                'IT & Communications',
                                                'Other',
                                            ];
                                        @endphp
                                        @foreach($interests as $interest)
                                            <option value="{{ $interest }}" {{ old('interest') == $interest ? 'selected' : '' }}>{{ $interest }}</option>
                                        @endforeach
                                    </select>
                                    @error('interest')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label fw-bold small text-uppercase">Why do you want to volunteer? <span class="ornab-body-text">(optional)</span></label>
                                    <textarea name="message" class="form-control" id="message" rows="4" placeholder="Tell us a little about yourself...">{{ old('message') }}</textarea>
                                    @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                                </div>
                                @if(config('recaptcha.enabled'))
                                <div class="col-12">
                                    {!! NoCaptcha::display() !!}
                                    @if($errors->has('g-recaptcha-response'))
                                        <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                                @endif
                                <div class="col-12 mt-2">
                                    <button type="submit" class="btn ornab-submit-btn w-100 py-3 fw-bold">
                                        Submit Application <i class="fa-solid fa-paper-plane ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</section>

<style>
    .ornab-form-control:focus { border-color: var(--brand-teal) !important; box-shadow: 0 0 0 0.25rem rgba(79,168,201,.25) !important; }
    .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.08) !important;
    }
</style>

@endsection

