@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-meta-text { color: #6B6258 !important; }
.ornab-back-btn { background: var(--brand-navy); color: #fff; border: none; }
.ornab-back-btn:hover { background: #0f377a; color: #fff; }
</style>

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Notices</li>
      </ol>
      <h2 class="ornab-page-title">Notice</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Notice Detail Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

        <div class="row">
            <div class="col-md-4">
                @if ($notice->image)
                <img src="{{ asset('images/notices/'.$notice->image) }}" class="card-img-top" alt="notice" width="100%">
                @endif
            </div>
            <div class="col-md-8 text-left">
                <h2 class="text-left ornab-page-title">{{ $notice->title }}</h2>
                <p class="ornab-meta-text" style="font-size: 12px;">
                    <i class="fas fa-calendar-minus"></i>
                    {{ $notice->publish_date ? \Carbon\Carbon::parse($notice->publish_date)->format('d F, Y') : date("d M, Y") }}
                </p>
                @if ($notice->notice_no)
                <p class="ornab-meta-text" style="font-size: 12px;">
                    <strong>Notice No:</strong> {{ $notice->notice_no }}
                </p>
                @endif
                <p style="text-align:justify;">
                    {{ $notice->description }}
                </p>
                @if ($notice->attachment)
                <p class="text-start">
                    <a href="{{ asset('images/notices/'.$notice->attachment) }}" target="_blank" class="btn btn-sm btn-primary">
                        <i class="bx bx-download"></i> Download Attachment
                    </a>
                </p>
                @endif
            </div>
            <div class="py-3">
                <a href="{{ route('notices.all') }}" class="btn ornab-back-btn"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Notices </a>
            </div>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Notice Detail Section -->

@endsection
