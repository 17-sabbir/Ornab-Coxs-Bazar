@extends('main')

@section('content')
<style>
.ornab-page-title { color: var(--brand-navy) !important; }
.ornab-donate-btn { background: var(--brand-coral); color: #fff; border: none; font-weight: 700; font-size: 1.15rem; padding: 16px 32px; border-radius: 50px; transition: all .3s ease; }
.ornab-donate-btn:hover { background: #DF9B74; color: #fff; }
.ornab-amount-btn { background: #fff; border: 1px solid var(--brand-border); color: var(--brand-text); font-weight: 600; border-radius: 50px; padding: 10px 24px; transition: all .3s ease; min-width: 80px; }
.ornab-amount-btn:hover, .ornab-amount-btn.selected { background: var(--brand-navy); color: #fff; border-color: var(--brand-navy); }
.ornab-success-msg { background: rgba(76,122,61,.08); color: var(--brand-green); border: 1px solid rgba(76,122,61,.15); }
.ornab-form-control:focus { border-color: var(--brand-teal) !important; box-shadow: 0 0 0 0.25rem rgba(79,168,201,.25) !important; }
.ornab-card-header { background: var(--brand-navy); color: #fff; }
.ornab-hero-text { color: var(--brand-coral); }
</style>

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2 class="ornab-page-title">Donate</h2>
        <div style="background-image: url('{{ asset('img/donation.jpg') }}')" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12 mx-auto text-center">
                        <h6 class="ornab-hero-text text-center">We need your cooperation</h6>
                        <h1 class="text-white text-center">Be a part of our mission to raise funds for impactful humanitarian causes.</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5 p-3 justify-content-center">
            <h5 class="fs-2 ornab-page-title">Please donate to us using the following payment methods.</h5>
            
            @if($paymentMethods->count() > 0)
                @foreach($paymentMethods as $method)
                    <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            @if($method->icon_image)
                                <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->type }}" width="50%">
                            @elseif($method->type == 'bank')
                                <h1><i class="fa-solid fa-building-columns"></i></h1>
                            @elseif(file_exists(public_path('img/'.$method->type.'.png')))
                                <img src="{{ asset('img/'.$method->type.'.png') }}" alt="{{ $method->type }}" width="50%">
                            @else
                                <h1><i class="fa-solid fa-money-bill-wave"></i></h1>
                            @endif
                            <h5 class="fs-5 mt-2">{{ $method->account_name }}</h5>
                            <h5 class="fs-4">{{ $method->account_number }}</h5>
                            
                            @if($method->type == 'bank' && $method->bank_details)
                                <ul class="list-unstyled text-start mt-2">
                                    @if(isset($method->bank_details['bank_name']))
                                        <li><small><strong>Bank:</strong> {{ $method->bank_details['bank_name'] }}</small></li>
                                    @endif
                                    @if(isset($method->bank_details['branch_name']))
                                        <li><small><strong>Branch:</strong> {{ $method->bank_details['branch_name'] }}</small></li>
                                    @endif
                                    @if(isset($method->bank_details['routing_number']))
                                        <li><small><strong>Routing:</strong> {{ $method->bank_details['routing_number'] }}</small></li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12 text-center py-4">
                    <p class="text-muted">Payment methods will be available soon.</p>
                </div>
            @endif
        </div>

        <!-- Donation Form -->
        <div class="row py-5 p-3">
            <div class="col-md-8 mx-auto">
                <div class="card border">
                    <div class="card-header ornab-card-header">
                        <h4 class="mb-0">Submit Your Donation Information</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert ornab-success-msg alert-dismissible fade show">
                                <i class="fa-solid fa-check-circle"></i> {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('donation.submit') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="donor_name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="donor_name" id="donor_name" 
                                           class="form-control @error('donor_name') is-invalid @enderror" 
                                           placeholder="Enter your full name" 
                                           value="{{ old('donor_name') }}" required>
                                    @error('donor_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="donor_phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="donor_phone" id="donor_phone" 
                                           class="form-control @error('donor_phone') is-invalid @enderror" 
                                           placeholder="e.g., +8801XXXXXXXXX" 
                                           value="{{ old('donor_phone') }}" required>
                                    @error('donor_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="payment_method_id" class="form-label">Payment Method Used <span class="text-danger">*</span></label>
                                    <select name="payment_method_id" id="payment_method_id" 
                                            class="form-select @error('payment_method_id') is-invalid @enderror" required>
                                        <option value="">-- Select Payment Method --</option>
                                        @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                                {{ ucfirst($method->type) }} - {{ $method->account_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_method_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="transaction_id" class="form-label">Transaction ID <span class="text-danger">*</span></label>
                                    <input type="text" name="transaction_id" id="transaction_id" 
                                           class="form-control @error('transaction_id') is-invalid @enderror" 
                                           placeholder="Enter transaction/reference ID" 
                                           value="{{ old('transaction_id') }}" required>
                                    @error('transaction_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="donation_type" class="form-label">Donation Type</label>
                                    <select name="donation_type" id="donation_type" class="form-select">
                                        <option value="one_time" {{ old('donation_type') == 'one_time' ? 'selected' : '' }}>One-time Donation</option>
                                        <option value="monthly" {{ old('donation_type') == 'monthly' ? 'selected' : '' }}>Monthly Donation</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="campaign_id" class="form-label">Campaign</label>
                                    <select name="campaign_id" id="campaign_id" class="form-select">
                                        <option value="">-- Select Campaign --</option>
                                        @foreach($campaigns as $campaign)
                                            <option value="{{ $campaign->id }}" {{ old('campaign_id') == $campaign->id ? 'selected' : '' }}>{{ $campaign->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Quick Amount</label>
                                <div class="d-flex flex-wrap gap-2 mb-3">
                                    <button type="button" class="ornab-amount-btn" data-amount="500">৳500</button>
                                    <button type="button" class="ornab-amount-btn" data-amount="1000">৳1000</button>
                                    <button type="button" class="ornab-amount-btn" data-amount="2000">৳2000</button>
                                    <button type="button" class="ornab-amount-btn" data-amount="5000">৳5000</button>
                                </div>
                                <label for="amount" class="form-label">Donation Amount (৳) <span class="text-danger">*</span></label>
                                <input type="number" name="amount" id="amount" 
                                       class="form-control ornab-form-control @error('amount') is-invalid @enderror" 
                                       placeholder="Enter amount in BDT" 
                                       min="1" step="0.01"
                                       value="{{ old('amount') }}" required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="purpose" class="form-label">Purpose of Donation</label>
                                <input type="text" name="purpose" id="purpose" class="form-control" value="{{ old('purpose') }}" placeholder="e.g. Emergency relief or education support">
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="is_anonymous" id="is_anonymous" value="1" {{ old('is_anonymous') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_anonymous">Make this donation anonymous</label>
                            </div>

                            <div class="alert" style="background: var(--brand-bg); color: var(--brand-text); border: 1px solid var(--brand-border);">
                                <i class="fa-solid fa-info-circle"></i> 
                                <strong>Fund Utilization Note:</strong> Please make your donation first, then submit this form with the transaction details. 
                                We will verify your donation and contact you soon. Your contribution directly supports our programs.
                            </div>

                            @if(config('recaptcha.enabled'))
                                <div class="mb-3">
                                    {!! NoCaptcha::display() !!}
                                    @if($errors->has('g-recaptcha-response'))
                                        <span class="text-danger small">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                            @endif

                            <button type="submit" class="btn ornab-donate-btn btn-lg w-100">
                                <i class="fa-solid fa-paper-plane"></i> Submit Donation Information
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const amountInput = document.getElementById('amount');
      const amountBtns = document.querySelectorAll('.ornab-amount-btn');
      amountBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          amountBtns.forEach(function (b) { b.classList.remove('selected'); });
          btn.classList.add('selected');
          amountInput.value = btn.getAttribute('data-amount');
        });
      });
    });
  </script>

@endsection
