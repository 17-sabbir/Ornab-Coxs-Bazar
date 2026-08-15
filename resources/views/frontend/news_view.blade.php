@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-meta-text { color: #6B6258 !important; }
.uerd-back-btn { background: var(--brand-navy); color: #fff; border: none; }
.uerd-back-btn:hover { background: #0f377a; color: #fff; }
</style>

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>News</li>
      </ol>
      <h2 class="uerd-page-title">Latest News</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/news/'.$news->image) }}" class="card-img-top" alt="activity" width="100%">
            </div>
            <div class="col-md-8 text-left">
                <h2 class="text-left uerd-page-title">{{ $news->title }}</h2>
                <p class="uerd-meta-text" style="font-size: 12px;">
                    <i class="fas fa-calendar-minus"></i>
                    {{ $news->news_date ? \Carbon\Carbon::parse($news->news_date)->format('d F, Y') : date("d M, Y") }}
                </p>
                <p style="text-align:justify;">
                    {{ $news->description }}
                </p>
            </div>
            <div class="py-3">
                <a href="{{ route('latest.news.all') }}" class="btn uerd-back-btn"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Media Center </a>
            </div>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
