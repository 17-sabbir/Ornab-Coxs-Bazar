@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">Legal Reg. Status</h6>
            <a href="{{ route('about.us.create') }}" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                <i class='bx bx-arrow-back me-1'></i> Back to About Us
            </a>
        </div>
        <hr/>

        <div class="row g-4">
            {{-- Add Form --}}
            <div class="col-lg-5">
                <div class="card h-100">
                    <div class="card-header bg-transparent border-0 pt-3">
                        <h6 class="fw-bold text-uppercase text-muted mb-0">Add Registration</h6>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        @endif
                        <form action="{{ route('admin.legal_registrations.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Registration Authority</label>
                                <input type="text" name="authority" class="form-control @error('authority') is-invalid @enderror" placeholder="e.g. Directorate of Social Welfare, Bangladesh" value="{{ old('authority') }}">
                                @error('authority')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Reg. Number</label>
                                <input type="text" name="reg_no" class="form-control @error('reg_no') is-invalid @enderror" placeholder="e.g. Cox: 367/09" value="{{ old('reg_no') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date of Reg.</label>
                                <input type="text" name="date_of_reg" class="form-control @error('date_of_reg') is-invalid @enderror" placeholder="e.g. 19.05.2009" value="{{ old('date_of_reg') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Renewal Info.</label>
                                <input type="text" name="renewal_info" class="form-control @error('renewal_info') is-invalid @enderror" placeholder="e.g. Applied / 2026" value="{{ old('renewal_info') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Order</label>
                                <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="is_active" class="form-check-input" id="is_active" checked>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                            <button class="btn btn-primary" type="submit"><i class='bx bx-save me-1'></i> Save</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- List --}}
            <div class="col-lg-7">
                <div class="card h-100">
                    <div class="card-header bg-transparent border-0 pt-3">
                        <h6 class="fw-bold text-uppercase text-muted mb-0">All Registrations</h6>
                    </div>
                    <div class="card-body">
                        @if($rows->count())
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Authority</th>
                                        <th>Reg. No.</th>
                                        <th>Date</th>
                                        <th>Renewal</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $row)
                                    <tr>
                                        <td class="fw-semibold">{{ $row->authority }}</td>
                                        <td>{{ $row->reg_no ?: '—' }}</td>
                                        <td>{{ $row->date_of_reg ?: '—' }}</td>
                                        <td>{{ $row->renewal_info ?: '—' }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.legal_registrations.delete', $row->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Delete this registration?');">
                                                <i class="bx bx-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <p class="text-muted text-center py-4 mb-0">No registrations added yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
