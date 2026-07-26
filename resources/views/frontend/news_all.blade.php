@extends('main')

@section('content')


    <!-- ======= Latest News Section ======= -->
    <section id="contact" class="contact bg-light p-0">
        <div class="container bg-white py-5" data-aos="fade-up">
            <div class="section-title">
                <h2>Latest News</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($news as $key=>$data)
                        <div class="col">
                            <div class="card border-0 shadow">
                                <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                                <div class="card-body ">
                                    <h5 class="card-title text-start">{{ Str::limit($data->title, 25, '...') }}</h5>
                                    <p class="text-secondary text-start" style="font-size: 12px;">
                                        <i class="fas fa-calendar-minus"></i>
                                        {{ $data->news_date ? \Carbon\Carbon::parse($data->news_date)->format('d F, Y') : date("d M, Y") }}
                                    </p>
                                    <p class="card-text py-3 text-start">
                                        {{ Str::limit($data->description,75,"...") }}
                                    </p>
                                    <p class="text-start">
                                        <a href="{{ route('latest.news.view',$data->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $news->links() }}
                </div>
            </div>
        </div>
    </section><!-- End Latest News Section -->

@endsection
