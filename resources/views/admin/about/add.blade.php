@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">About Us — Manage All Sections</h6>
            <a href="{{ route('mission.vision.edit') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">
                <i class="bx bx-target-lock me-1"></i> Mission &amp; Vision
            </a>
        </div>
        <hr/>
        
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form action="{{ isset($about) ? route('about.us.update') : route('about.us.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Tabs -->
                        <ul class="nav nav-tabs mb-4" id="aboutTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About Us</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab">Vision</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab">Mission</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="story-tab" data-bs-toggle="tab" data-bs-target="#story" type="button" role="tab">Our Story</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="philosophy-tab" data-bs-toggle="tab" data-bs-target="#philosophy" type="button" role="tab">Philosophy</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="corevalues-tab" data-bs-toggle="tab" data-bs-target="#corevalues" type="button" role="tab">Core Values</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="registration-tab" data-bs-toggle="tab" data-bs-target="#registration" type="button" role="tab">Registration Info</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="aboutTabsContent">
                            <!-- About Us -->
                            <div class="tab-pane fade show active" id="about" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">About Us</label>
                                        <textarea name="about_us" class="form-control summernote" rows="5">{{ $about->about_us ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="about_image" class="form-control">
                                        @if(isset($about->about_image) && $about->about_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/about_us/'.$about->about_image) }}" width="120" class="border rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Vision -->
                            <div class="tab-pane fade" id="vision" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Vision</label>
                                        <textarea name="vision" class="form-control summernote" rows="5">{{ $about->vision ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="vision_image" class="form-control">
                                        @if(isset($about->vision_image) && $about->vision_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/about_us/'.$about->vision_image) }}" width="120" class="border rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Mission -->
                            <div class="tab-pane fade" id="mission" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Mission</label>
                                        <textarea name="mission" class="form-control summernote" rows="5">{{ $about->mission ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="mission_image" class="form-control">
                                        @if(isset($about->mission_image) && $about->mission_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/about_us/'.$about->mission_image) }}" width="120" class="border rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Our Story -->
                            <div class="tab-pane fade" id="story" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Our Story</label>
                                        <textarea name="our_story" class="form-control summernote" rows="5">{{ $about->our_story ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="story_image" class="form-control">
                                        @if(isset($about->story_image) && $about->story_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/about_us/'.$about->story_image) }}" width="120" class="border rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Philosophy -->
                            <div class="tab-pane fade" id="philosophy" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Philosophy</label>
                                        <textarea name="philosophy" class="form-control summernote" rows="5">{{ $about->philosophy ?? '' }}</textarea>
                                        <span class="text-info small">Ornab's core philosophy / belief statement.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Core Values -->
                            <div class="tab-pane fade" id="corevalues" role="tabpanel">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Core Values</label>
                                        <textarea name="core_values" class="form-control" rows="8" placeholder="Integrity | We uphold honesty, ethical conduct...">{{ $about->core_values ?? '' }}</textarea>
                                        <span class="text-info small">One value per line. Format: <code>Name | Description</code>. These show on the About Us and Mission & Vision pages.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Registration Info -->
                            <div class="tab-pane fade" id="registration" role="tabpanel">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="fw-bold text-uppercase text-muted mb-0">Registration Info</h6>
                                    <a href="{{ route('admin.legal_registrations.index') }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class='bx bx-list-ul me-1'></i> Manage Legal Reg. Status
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Registration Info</label>
                                        <textarea name="registration_info" class="form-control summernote" rows="5">{{ $about->registration_info ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Image</label>
                                        <input type="file" name="registration_image" class="form-control">
                                        @if(isset($about->registration_image) && $about->registration_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('images/about_us/'.$about->registration_image) }}" width="120" class="border rounded">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button class="btn btn-primary" type="submit">Save All</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Preview --}}
        @if(isset($about))
        <div class="card mt-4">
            <div class="card-header"><strong>Preview</strong></div>
            <div class="card-body">
                <div class="row">
                    @php
                        $previewItems = [
                            'About Us' => [$about->about_us ?? ''],
                            'Philosophy' => [$about->philosophy ?? ''],
                            'Core Values' => [$about->core_values ?? ''],
                            'Vision' => [$about->vision ?? ''],
                            'Mission' => [$about->mission ?? ''],
                            'Our Story' => [$about->our_story ?? ''],
                            'Registration Info' => [$about->registration_info ?? ''],
                        ];
                    @endphp
                    @foreach($previewItems as $title => $texts)
                        @if(!empty($texts[0]))
                        <div class="col-md-6 mb-3">
                            <h6 class="fw-bold">{{ $title }}:</h6>
                            <div class="p-3 bg-light rounded">{!! nl2br(e(Str::limit(strip_tags($texts[0]), 200))) !!}</div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@push('scripts')
<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });
});
</script>
@endpush
