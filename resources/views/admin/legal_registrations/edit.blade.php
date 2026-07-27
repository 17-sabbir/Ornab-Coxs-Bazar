@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Legal Registration</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form action="{{ route('admin.legal_registrations.update', $row->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Registration Authority</label>
                            <input type="text" name="authority" class="form-control @error('authority') is-invalid @enderror" placeholder="e.g. Directorate of Social Welfare, Bangladesh" value="{{ old('authority', $row->authority) }}">
                            @error('authority')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reg. Number</label>
                            <input type="text" name="reg_no" class="form-control" placeholder="e.g. Cox: 367/09" value="{{ old('reg_no', $row->reg_no) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Reg.</label>
                            <input type="text" name="date_of_reg" class="form-control" placeholder="e.g. 19.05.2009" value="{{ old('date_of_reg', $row->date_of_reg) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Renewal Info.</label>
                            <input type="text" name="renewal_info" class="form-control" placeholder="e.g. Applied / 2026" value="{{ old('renewal_info', $row->renewal_info) }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="{{ old('order', $row->order) }}">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active" {{ $row->is_active ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                        <button class="btn btn-primary" type="submit"><i class='bx bx-save me-1'></i> Update</button>
                        <a href="{{ route('admin.legal_registrations.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection