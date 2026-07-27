@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="mb-3">
            <h6 class="mb-0 text-uppercase">Legal Reg. Status</h6>
        </div>
        <hr/>

        {{-- List --}}
        <div class="card mb-4">
            <div class="card-header bg-transparent border-0 pt-3 d-flex justify-content-between align-items-center">
                <h6 class="fw-bold text-uppercase text-muted mb-0">All Registrations</h6>
                <a href="{{ route('admin.legal_registrations.index', ['add' => 1]) }}" class="btn btn-primary btn-sm rounded-pill">
                    <i class='bx bx-plus me-1'></i> Add Registration
                </a>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if($rows->count())
                <div class="table-responsive" style="max-height: 70vh; overflow: auto;">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light sticky-top">
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
                                    <a href="{{ route('admin.legal_registrations.edit', $row->id) }}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.legal_registrations.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this registration?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger text-white" title="Delete">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>
                                    </form>
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

        {{-- Add Form --}}
        @if($showAddForm)
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-transparent border-0 pt-3 d-flex justify-content-between align-items-center">
                        <h6 class="fw-bold text-uppercase text-muted mb-0">Add Registration</h6>
                        <a href="{{ route('admin.legal_registrations.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Cancel</a>
                    </div>
                    <div class="card-body">
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
        </div>
        @endif
    </div>
</div>
@endsection