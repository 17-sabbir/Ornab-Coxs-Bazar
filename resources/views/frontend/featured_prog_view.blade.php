@extends('main')

@section('content')
  <div class="container pt-5 pb-3 text-center">
      <h1 class="display-3 fw-bold text-uppercase" style="background: linear-gradient(to right, #009688, #8bc34a); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
          @if(isset($program))
            {{ $program->title }}
          @else
            Program Details
          @endif
      </h1>
  </div>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Program Highlights</h2>
        @if(isset($program))
        <div class="row">
            <div class="col text-start">
                @if($program->image)
                <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="w-50 mb-4 rounded shadow-sm">
                @else
                <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}" class="w-50 mb-4 rounded shadow-sm">
                @endif
                
                <h3 class="mt-3">{{ $program->title }}</h3>
                
                <div class="mb-3">
                    <span class="badge {{ $program->status == 'active' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($program->status) }}</span>
                    @if($program->start_date)
                    <small class="text-muted ms-2">Started: {{ date('M d, Y', strtotime($program->start_date)) }}</small>
                    @endif
                </div>

                <div style="text-align: justify; white-space: pre-wrap;">{{ $program->description }}</div>
                
                <div class="py-3 mt-4">
                    <a href="{{ route('programs.all') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Programs</a>
                </div>
            </div>
        </div>
        @else
        <div class="text-center">
            <p>Program not found.</p>
            <a href="{{ route('programs.all') }}" class="btn btn-primary">Back to Programs</a>
        </div>
        @endif
      </div>
    </div>
  </section>
  {{-- End of Featured Program Single View --}}


@endsection
