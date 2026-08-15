@extends('main')

@section('content')

    <!-- ======= Origin & Legal Affiliation (About Us) ======= -->
    <section class="au-hero2">
        <div class="container text-center">
            <p class="au-lead2">How we are registered and empowered to operate transparently.</p>
        </div>
    </section>

    <section class="au-body">
        <div class="container">

            {{-- Legal Reg. Status Table --}}
            <div class="row g-5 align-items-center mb-5">
                <div class="col-12" data-aos="fade-up">
                    <span class="au-eyebrow">Legal Reg. Status</span>
                    <h2 class="au-heading mb-4">Registration & Compliance</h2>

                    @if(isset($legalRegistrations) && $legalRegistrations->count())
                    <div class="table-responsive au-reg-table">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Registration Authority</th>
                                    <th>Reg. Number</th>
                                    <th>Date of Reg.</th>
                                    <th>Renewal Info.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($legalRegistrations as $reg)
                                <tr>
                                    <td class="fw-semibold">{{ $reg->authority }}</td>
                                    <td>{{ $reg->reg_no ?: '—' }}</td>
                                    <td>{{ $reg->date_of_reg ?: '—' }}</td>
                                    <td>{{ $reg->renewal_info ?: '—' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="au-prose">
                        <div class="au-text text-justify">
                            <p class="mb-4">
                                Ornab Cox's Bazar is registered with the <strong>NGO Affairs Bureau (NGOAB)</strong> of the Prime Minister's Office, Government of the People's Republic of Bangladesh.
                            </p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Documents --}}
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="au-eyebrow">Overview</span>
                    <h2 class="au-heading">Origin and Legal Affiliation</h2>
                    <div class="au-text" style="line-height: 1.9;">
                        <p class="mb-4">
                            Ornab Cox's Bazar is a non-governmental development organization, formally launched on July 1, 2008, working to improve the socio-economic conditions of poor and underprivileged women and children in Cox's Bazar.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <h3 class="au-heading-sm">Certificates &amp; Documents</h3>
                    <div class="d-flex flex-column gap-3">
                        @foreach ($affilation as $key => $data)
                            <a href="{{ asset('images/legal_affilation/'.$data->document) }}" target="_blank" class="au-doc">
                                <div class="au-doc-icon"><i class="fa-solid fa-file-contract"></i></div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $data->title }}</h6>
                                    <small class="uerd-body-muted"><i class="fa-solid fa-download me-1"></i> Click to view document</small>
                                </div>
                                <i class="fa-solid fa-chevron-right au-doc-arrow"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </section>

    <style>
        .uerd-page-title { color: var(--brand-navy) !important; }
        .uerd-body-text { color: var(--brand-text) !important; }
        .uerd-icon-circle { background: var(--brand-green) !important; color: #fff !important; }
        .uerd-section-alt { background: var(--brand-bg) !important; }
        .au-hero2 { background: #fff; padding: 44px 0 30px; text-align: center; }
        .au-lead2 { color: var(--brand-navy); font-size: 1.5rem; font-weight: 600; max-width: 760px; margin: 0 auto; line-height: 1.6; }
        .au-body { background: var(--brand-bg); padding: 60px 0 80px; }
        .au-eyebrow { display: inline-block; font-size: .8rem; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: var(--brand-green); background: rgba(76,122,61,.1); padding: .3rem .9rem; border-radius: 50px; margin-bottom: 1rem; }
        .au-heading { font-weight: 700; color: var(--brand-navy); margin-bottom: 1.2rem; }
        .au-heading-sm { font-weight: 700; color: var(--brand-navy); margin-bottom: 1.4rem; }
        .au-text { color: var(--brand-text); font-size: 1.02rem; }
        .au-text p { margin-bottom: 1rem; }
        .au-reg-table { border: 1px solid var(--brand-border); border-radius: 16px; overflow: hidden; box-shadow: 0 8px 26px rgba(18,43,107,.06); }
        .au-reg-table thead th { background: var(--brand-navy); color: #fff; font-weight: 600; text-transform: uppercase; font-size: .78rem; letter-spacing: .5px; border: none; }
        .au-reg-table tbody td { vertical-align: middle; color: var(--brand-navy); font-size: .95rem; border-bottom: 1px solid var(--brand-border); }
        .au-reg-table tbody tr:last-child td { border-bottom: none; }
        .au-reg-table tbody tr:hover { background: var(--brand-bg); }
        .au-doc { display: flex; align-items: center; gap: 1rem; text-decoration: none; background: #fff; border: 1px solid var(--brand-border); border-radius: 14px; padding: 1rem 1.2rem; box-shadow: 0 4px 16px rgba(18,43,107,.05); transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease; }
        .au-doc:hover { transform: translateX(6px); box-shadow: 0 10px 24px rgba(76,122,61,.14); border-color: var(--brand-green); }
        .au-doc-icon { width: 52px; height: 52px; border-radius: 12px; flex: 0 0 auto; display: flex; align-items: center; justify-content: center; background: rgba(76,122,61,.1); color: var(--brand-green); font-size: 1.3rem; }
        .au-doc h6 { margin: 0; color: var(--brand-navy); font-weight: 700; }
        .au-doc small { color: var(--brand-text); opacity: 0.6; }
        .au-doc-arrow { margin-left: auto; color: var(--brand-green); transition: transform .25s ease; }
        .au-doc:hover .au-doc-arrow { transform: translateX(4px); }
    </style>

@endsection
