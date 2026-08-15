@extends('main')

@section('content')
<style>
.uerd-page-title { color: var(--brand-navy) !important; }
.uerd-meta-text { color: #6B6258 !important; }
.uerd-read-more { color: var(--brand-teal); text-decoration: none; font-weight: 600; }
.uerd-read-more:hover { color: var(--brand-navy); text-decoration: underline; text-underline-offset: 4px; }
.uerd-pagination .page-item.active .page-link { background: var(--brand-navy); border-color: var(--brand-navy); color: #fff; }
.uerd-pagination .page-link { color: var(--brand-text); }
.uerd-pagination .page-link:hover { color: var(--brand-navy); }
</style>

    <!-- ======= Latest News Section ======= -->
    <section id="contact" class="contact bg-light p-0">
        <div class="container bg-white py-5" data-aos="fade-up">
            <div class="section-title">
                <h2 class="uerd-page-title">Latest News</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $key=>$data)
                        <div class="col">
                            <div class="card border-0 shadow">
                                <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                                <div class="card-body ">
                                    <h5 class="card-title text-start">{{ Str::limit($data->title, 25, '...') }}</h5>
                                    <p class="uerd-meta-text text-start" style="font-size: 12px;">
                                        <i class="fas fa-calendar-minus"></i>
                                        {{ $data->news_date ? \Carbon\Carbon::parse($data->news_date)->format('d F, Y') : date("d M, Y") }}
                                    </p>
                                    <p class="card-text py-3 text-start">
                                        {{ Str::limit($data->description,75,"...") }}
                                    </p>
                                    <p class="text-start">
                                         <a href="{{ route('latest.news.view',$data->id) }}" class="uerd-read-more"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <div class="uerd-pagination">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Latest News Section -->

@endsection
