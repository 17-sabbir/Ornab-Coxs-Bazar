@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.accordion-button { color: var(--brand-text); }
.accordion-button:not(.collapsed) { color: var(--brand-navy); border-left: 3px solid var(--brand-coral); }
.accordion-button:focus { box-shadow: 0 0 0 0.25rem rgba(79,168,201,.25); border-color: var(--brand-teal); }
</style>

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>FAQ</li>
      </ol>
      <h2 class="ornab-page-title">Frequently Asked Questions</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2 class="ornab-page-title">Frequently Asked Questions</h2>
        @if(isset($faqs) && count($faqs) > 0)
            <div class="accordion accordion-flush border rounded" id="accordionFlushExample" style="max-height: 70vh; overflow-y: auto;">
                @foreach($faqs as $index => $faq)
                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-heading{{ $index }}">
                    <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="flush-collapse{{ $index }}">
                        <strong>{{ $faq->question }}</strong>
                    </button>
                    </h3>
                    <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="flush-heading{{ $index }}" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body text-start">
                            {!! nl2br(e($faq->answer)) !!}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-center ornab-body-text fs-5">No FAQs available at the moment.</p>
        @endif
      </div>
    </div>
  </section>
  <!-- End FAQ Section -->

@endsection
