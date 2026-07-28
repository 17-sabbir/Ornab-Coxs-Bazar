@extends('main')

@section('content')

    <!-- ======= About Us ======= -->
    <section class="py-5" style="background: #f4f7f5;">
        <div class="container">
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-5">
                    @if(!empty($about_us->about_image))
                        <img src="{{ asset('images/about_us/'.$about_us->about_image) }}" alt="About Ornab Cox's Bazar" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                    @else
                        <img src="{{ asset('images/about_us/placeholder.jpg') }}" alt="About Ornab Cox's Bazar" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px; background: #e9ecef;">
                    @endif
                </div>
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: #0d9488; color: #fff; flex: 0 0 auto;">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <h2 class="fw-bold mb-0" style="color: #10372f;">About Ornab Cox's Bazar</h2>
                    </div>
                    <div class="text-secondary" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                        {!! $about_us->about_us ?? '' !!}
                    </div>
                </div>
            </div>

            @if(!empty($about_us->our_story))
            <div class="row align-items-center g-5 mb-5 flex-lg-row-reverse">
                <div class="col-lg-5">
                    @if(!empty($about_us->story_image))
                        <img src="{{ asset('images/about_us/'.$about_us->story_image) }}" alt="Our Story" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                    @else
                        <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #eafaf5, #d3f0e8); min-height: 380px;">
                            <i class="fa-solid fa-book-open" style="font-size: 5rem; color: #0d9488; opacity: .35;"></i>
                        </div>
                    @endif
                </div>
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: #0d9488; color: #fff; flex: 0 0 auto;">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h2 class="fw-bold mb-0" style="color: #10372f;">Our Story</h2>
                    </div>
                    <div class="text-secondary" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                        {!! $about_us->our_story !!}
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($about_us->philosophy))
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-5">
                    <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #eafaf5, #d3f0e8); min-height: 380px;">
                        <i class="fa-solid fa-seedling" style="font-size: 5rem; color: #0d9488; opacity: .35;"></i>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: #0d9488; color: #fff; flex: 0 0 auto;">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <h2 class="fw-bold mb-0" style="color: #10372f;">Our Philosophy</h2>
                    </div>
                    <div class="text-secondary" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                        {!! $about_us->philosophy !!}
                    </div>
                </div>
            </div>
            @endif

        </div>
    </section>
    <!-- End About Us -->

@endsection
