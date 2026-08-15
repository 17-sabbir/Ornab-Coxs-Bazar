@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
</style>

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2 class="uerd-page-title">Youtube <i class="fa-brands fa-youtube" style="color: red;"></i> </h2>
            <div class="row">
                @if(isset($videos) && $videos->count())
                    @foreach($videos as $v)
                        <div class="col-md-4 mb-3">
                            <div class="ratio ratio-16x9">
                                <?php
                                $link = $v->youtube_link;
                                $videoId = null;
                                if (preg_match('/(?:v=|embed\/|youtu\.be\/)([A-Za-z0-9_\-]+)/', $link, $m)) {
                                    $videoId = $m[1];
                                }
                                $src = $videoId ? 'https://www.youtube.com/embed/'.$videoId : $link;
                                ?>
                                <iframe src="{{ $src }}" title="{{ $v->title ?? 'YouTube video' }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p>No videos found.</p>
                    </div>
                @endif
            </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
