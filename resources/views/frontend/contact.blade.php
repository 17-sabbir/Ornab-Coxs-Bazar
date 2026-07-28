@extends('main')

@section('content')

<!-- ======= Contact Page ======= -->
<section class="contact-page-wrapper" style="padding-top: 80px;">
    <div class="container">
        <!-- Top Section -->
        <div class="row align-items-start mb-5">
            <!-- Left: Hero Text -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <h6 class="text-uppercase fw-bold mb-2" style="color: #0F766E; letter-spacing: 1.5px; font-size: 0.85rem;">Get in Touch</h6>
                <h1 class="fw-bold mb-3" style="font-size: 2.8rem; line-height: 1.2; color: #1a1a1a; font-family: 'Playfair Display', serif;">
                    Contact<br>Ornab Cox's Bazar
                </h1>
                <p class="mb-4" style="color: #6b7280; line-height: 1.7; font-size: 0.95rem;">
                    Have questions or need assistance? We're here to help! Reach out to us through any of the channels below.
                </p>
                <div class="d-none d-lg-block">
                    <a href="#contact-form" class="btn btn-dark rounded-pill px-4 py-2" style="background: #0F766E; border-color: #0F766E; font-weight: 600; font-size: 0.9rem;">
                        We'd love to hear from you <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Right: Contact Info List -->
            <div class="col-lg-7">
                @php
                    $allContacts = DB::table('contacts')->where('status', 'active')->orderBy('type', 'asc')->orderBy('id', 'asc')->get();
                @endphp

                <div class="d-flex flex-column gap-3">
                    @foreach($allContacts as $contact)
                        <div class="card border-0 shadow-sm rounded-4 p-3" style="max-width: 100%;">
                            <div class="d-flex align-items-start gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle flex-shrink-0" style="width: 44px; height: 44px; background: #f0fdf4; color: #0F766E;">
                                    @if($contact->type == 'head_office')
                                        <i class="fa-solid fa-building-columns"></i>
                                    @elseif($contact->type == 'branch')
                                        <i class="fa-solid fa-map-location-dot"></i>
                                    @elseif($contact->type == 'person')
                                        <i class="fa-solid fa-user-tie"></i>
                                    @else
                                        <i class="fa-solid fa-location-dot"></i>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1" style="color: #1a1a1a; font-size: 0.95rem;">{{ $contact->title ?: ucfirst(str_replace('_', ' ', $contact->type)) }}</h6>
                                    <div class="mb-1" style="color: #6b7280; font-size: 0.85rem; line-height: 1.5;">
                                        <i class="fa-solid fa-location-dot me-1" style="color: #0F766E;"></i> {{ $contact->address }}
                                    </div>
                                    @if($contact->mobile)
                                        <div class="mb-1" style="color: #6b7280; font-size: 0.85rem;">
                                            <i class="fa-solid fa-phone me-1" style="color: #0F766E;"></i> {{ $contact->mobile }}
                                        </div>
                                    @endif
                                    @if($contact->email)
                                        <div style="color: #6b7280; font-size: 0.85rem;">
                                            <i class="fa-regular fa-envelope me-1" style="color: #0F766E;"></i> {{ $contact->email }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($allContacts->isEmpty())
                        <div class="text-center py-4" style="color: #6b7280;">
                            <p>No contact information available at the moment.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contact Form Section -->
        <div class="row g-0 rounded-4 overflow-hidden shadow-lg mb-5" id="contact-form">
            <!-- Left Dark Panel -->
            <div class="col-lg-5" style="background: #0F4C3A; padding: 50px 40px; position: relative;">
                <!-- Talking Bubble Icon -->
                <div class="position-absolute top-0 end-0 p-4" style="opacity: 0.15;">
                    <i class="fa-solid fa-comments" style="font-size: 120px; color: #fff;"></i>
                </div>

                <div class="position-relative" style="z-index: 1;">
                    <h3 class="fw-bold mb-2" style="color: #fff; font-size: 1.8rem; line-height: 1.2;">Let's start a<br>conversation</h3>
                    <p class="mb-5" style="color: rgba(255,255,255,0.75); font-size: 0.9rem; line-height: 1.7; max-width: 320px;">
                        We're excited to hear from you! Send us a message and we'll get back to you as soon as possible.
                    </p>

                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; min-width: 40px; background: rgba(255,255,255,0.15); color: #fff;">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <span style="color: #fff; font-size: 0.9rem;">ornabcoxsbazar@gmail.com</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; min-width: 40px; background: rgba(255,255,255,0.15); color: #fff;">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <span style="color: #fff; font-size: 0.9rem;">+880 186-5184360</span>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; min-width: 40px; background: rgba(255,255,255,0.15); color: #fff;">
                                <i class="fa-solid fa-globe"></i>
                            </div>
                            <span style="color: #fff; font-size: 0.9rem;">www.ornabcoxsbazar.org</span>
                        </div>
                    </div>

                    <!-- Social Icons -->
                    <div class="d-flex gap-3 mt-5">
                        <a href="{{ application()->facebook }}" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="{{ application()->twitter }}" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="{{ application()->instagram }}" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="{{ application()->youtube }}" target="_blank" rel="noopener noreferrer" class="d-flex align-items-center justify-content-center rounded-circle" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); color: #fff; text-decoration: none; transition: all 0.3s ease;">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Form Panel -->
            <div class="col-lg-7" style="background: #fff; padding: 50px 40px;">
                <span class="fw-bold text-uppercase small mb-1 d-block" style="color: #0F766E; font-size: 0.85rem; letter-spacing: 1px;">Write to us</span>
                <h2 class="fw-bold mb-4" style="color: #1a1a1a; font-size: 1.5rem;">Send a Message</h2>

                @if (session()->has('success'))
                    <div class="alert alert-success rounded-3 px-4 mb-4 border-0" style="background: #dcfce7; color: #166534;">
                        <i class="fa-solid fa-check-circle me-2"></i> {{ session()->get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3 px-4 mb-4 border-0" style="background: #fee2e2; color: #991b1b;">
                        <ul class="mb-0 ps-3" style="font-size: 0.9rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('message.store') }}" method="post" role="form">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-bold small mb-1" style="color: #374151; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Robiul Islam" value="{{ old('name') }}" required style="border-radius: 10px; border: 1px solid #e5e7eb; padding: 12px 16px; font-size: 0.9rem;">
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-bold small mb-1" style="color: #374151; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">Your Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="sabbir@gmail.com" value="{{ old('email') }}" required style="border-radius: 10px; border: 1px solid #e5e7eb; padding: 12px 16px; font-size: 0.9rem;">
                            @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label fw-bold small mb-1" style="color: #374151; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">Subject</label>
                            <div class="input-group" style="border-radius: 10px; border: 1px solid #e5e7eb;">
                                <span class="input-group-text border-0" style="background: #f9fafb; border-radius: 10px 0 0 10px; color: #9ca3af;">
                                    <i class="fa-regular fa-circle-question"></i>
                                </span>
                                <input type="text" name="subject" class="form-control border-0" id="subject" placeholder="How can we help?" value="{{ old('subject') }}" required style="padding: 12px 16px; font-size: 0.9rem;">
                            </div>
                            @error('subject')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label fw-bold small mb-1" style="color: #374151; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.5px;">Message</label>
                            <div class="position-relative">
                                <textarea class="form-control" name="message" rows="5" placeholder="Tell us about your project or inquiry..." required style="border-radius: 10px; border: 1px solid #e5e7eb; padding: 12px 16px; font-size: 0.9rem; resize: vertical;">{{ old('message') }}</textarea>
                                <span class="position-absolute top-0 end-0 m-2 text-muted small" style="font-size: 0.75rem; color: #0F766E !important; cursor: pointer;">Guide?</span>
                            </div>
                            @error('message')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-12 mt-4">
                            @if(config('recaptcha.enabled'))
                                <div class="mb-3">
                                    {!! NoCaptcha::display() !!}
                                    @if($errors->has('g-recaptcha-response'))
                                        <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                            @endif
                            <button type="submit" class="btn w-100 py-3 text-white fw-bold" style="background: #0F766E; border-color: #0F766E; border-radius: 12px; font-size: 1rem; transition: all 0.3s ease; box-shadow: 0 4px 14px rgba(15, 118, 110, 0.3);">
                                Send Message <i class="fa-solid fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Map Section -->
        <div class="rounded-4 overflow-hidden shadow-lg" data-aos="fade-up">
            <iframe src="{{ application()->google_map_embed ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29711.083044610674!2d91.96255989655302!3d21.433749767245697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30adc7266cb6de1d%3A0xbc13462b2ea76ec6!2sYasin%20Mansion!5e0!3m2!1sen!2sbd!4v1785163547013!5m2!1sen!2sbd' }}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<style>
    .contact-page-wrapper .form-control:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        border-color: #0F766E !important;
    }
    .contact-page-wrapper textarea:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(15, 118, 110, 0.1);
        border-color: #0F766E !important;
    }
    .contact-page-wrapper a:hover {
        opacity: 0.8;
    }
</style>

@endsection
