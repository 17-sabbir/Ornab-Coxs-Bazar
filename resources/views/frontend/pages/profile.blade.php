@extends('main')

@section('title', 'Organization Profile - Ornab Cox\'s Bazar')

@section('content')
<div class="bg-white py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Sidebar / Quick Info -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4 sticky-top" style="top: 80px; z-index: 10;">
                    <div class="card-header bg-danger text-white fw-bold py-3"><i class="fa-solid fa-circle-info me-2"></i> Ornab Cox's Bazar at a Glance</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                             <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <strong>Established</strong>
                                <span class="badge bg-light text-dark border">{{ $orgProfile->establishment_year ? \Carbon\Carbon::parse($orgProfile->establishment_year)->year : 'N/A' }}</span>
                            </li>
                            <li class="list-group-item py-3">
                                <strong>Type:</strong> <br>
                                <small class="text-secondary">{{ $orgProfile->organization_type }}</small>
                            </li>
                            <li class="list-group-item py-3">
                                <strong>Head Office:</strong> <br>
                                @php
                                    $headOffice = DB::table('contacts')->where('type', 'head_office')->where('status', 'active')->first();
                                    $headOfficeAddress = $headOffice->address ?? ($orgProfile->head_office_address ?? '');
                                @endphp
                                <small class="text-secondary">{!! nl2br(e($headOfficeAddress)) !!}</small>
                            </li>
                        </ul>
                            <div class="p-3 bg-light">
                                @php
                                    $contactEmail = 'uerd.org@gmail.com';
                                    $contactPhone = $orgProfile->phone ?? (optional($headOffice)->mobile ?? null);
                                    // if phone is not set, use a default dummy or leave empty
                                @endphp
                                <a href="javascript:void(0)" onclick="alert('Please mail on uerd.org@gmail.com')" class="btn btn-outline-danger w-100 mb-2"><i class="fa-solid fa-envelope me-2"></i> Email Us</a>
                                @if($contactPhone)
                                    <a href="javascript:void(0)" onclick="handleCallUs('{{ $contactPhone }}')" class="btn btn-outline-dark w-100"><i class="fa-solid fa-phone me-2"></i> Call Us</a>
                                @else
                                    <a class="btn btn-outline-dark w-100 disabled" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-phone me-2"></i> Call Us</a>
                                @endif
                            </div>
                            
                            <script>
                                function handleCallUs(phoneNum) {
                                    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
                                    if (isMobile) {
                                        window.location.href = "tel:" + phoneNum;
                                    } else {
                                        alert("You cannot make call from web");
                                    }
                                }
                            </script>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-8">
                 <div class="mb-5">
                    <h2 class="display-6 fw-bold text-dark mb-4 border-start border-5 border-danger ps-3">{{ $orgProfile->organization_name }}</h2>
                    <div class="text-secondary text-justify" style="line-height: 1.8; font-size: 1.05rem;">
                        {!! nl2br(e($orgProfile->background_info)) !!}
                    </div>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-3 h-100 border-top border-5 border-danger shadow-sm">
                            <h4 class="fw-bold mb-3 text-danger"><i class="fa-solid fa-bullseye me-2"></i> Mission</h4>
                            <p class="text-secondary mb-0">{{ $orgProfile->mission }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-4 bg-light rounded-3 h-100 border-top border-5 border-success shadow-sm">
                            <h4 class="fw-bold mb-3 text-success"><i class="fa-solid fa-eye me-2"></i> Vision</h4>
                            <p class="text-secondary mb-0">{{ $orgProfile->vision }}</p>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white fw-bold py-3 border-bottom"><i class="fa-solid fa-file-contract me-2 text-primary"></i> Legal Status / Registration</div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="ps-4">Concerned Department</th>
                                        <th>Registration No.</th>
                                        <th class="pe-4 text-end">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">NGO Affair`s Bureau</td>
                                        <td>{{ $orgProfile->ngo_bureau_reg_no }}</td>
                                        <td class="pe-4 text-end">{{ \Carbon\Carbon::parse($orgProfile->ngo_bureau_reg_date)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">Department of Social Welfare</td>
                                        <td>{{ $orgProfile->social_welfare_reg_no }}</td>
                                        <td class="pe-4 text-end">{{ \Carbon\Carbon::parse($orgProfile->social_welfare_reg_date)->format('d-m-Y') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                {{-- Staff & Assets quick stats based on doc --}}
                <div class="row g-3 text-center">
                    <div class="col-6 col-md-3">
                         @php $staffCount = max(0, DB::table('team_members')->count() - 1); @endphp
                         <div class="p-3 border rounded h-100 d-flex flex-column justify-content-center">
                             <h3 class="fw-bold text-dark mb-0">{{ str_pad($staffCount, 2, '0', STR_PAD_LEFT) }}</h3>
                             <small class="text-uppercase text-secondary" style="font-size: 0.7rem;">Full Time Staff</small>
                         </div>
                    </div>
                     <div class="col-6 col-md-3">
                         <div class="p-3 border rounded h-100 d-flex flex-column justify-content-center">
                             <h3 class="fw-bold text-dark mb-0">21</h3>
                             <small class="text-uppercase text-secondary" style="font-size: 0.7rem;">General Body</small>
                         </div>
                    </div>
                     <div class="col-6 col-md-3">
                         <div class="p-3 border rounded h-100 d-flex flex-column justify-content-center">
                             <h3 class="fw-bold text-dark mb-0">07</h3>
                             <small class="text-uppercase text-secondary" style="font-size: 0.7rem;">Executive Body</small>
                         </div>
                    </div>
                     <div class="col-6 col-md-3">
                         <div class="p-3 border rounded h-100 d-flex flex-column justify-content-center">
                             <h3 class="fw-bold text-dark mb-0">03</h3>
                             <small class="text-uppercase text-secondary" style="font-size: 0.7rem;">Advisors</small>
                         </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
