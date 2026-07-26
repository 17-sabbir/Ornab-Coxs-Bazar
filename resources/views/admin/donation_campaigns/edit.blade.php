@extends('layouts.admin')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body">
        <h5 class="mb-3">Edit Donation Campaign</h5>
        <form action="{{ route('admin.donation_campaigns.update', $campaign->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $campaign->title }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active" {{ $campaign->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $campaign->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Purpose</label>
                    <input type="text" name="purpose" class="form-control" value="{{ $campaign->purpose ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ $campaign->order }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="4" class="form-control">{{ $campaign->description ?? '' }}</textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update Campaign</button>
                    <a href="{{ route('admin.donation_campaigns.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
