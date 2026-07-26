@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Board Member</h1>
        <a href="{{ route('admin.board_of_directors.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.board_of_directors.update', $boardOfDirector) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $boardOfDirector->name) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Designation <span class="text-danger">*</span></label>
                        <input type="text" name="designation" class="form-control" value="{{ old('designation', $boardOfDirector->designation) }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label>Bio</label>
                        <textarea name="bio" class="form-control" rows="4">{{ old('bio', $boardOfDirector->bio) }}</textarea>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Image (Max: 2MB)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @if($boardOfDirector->image)
                            <small class="d-block mt-1">
                                <img src="{{ asset('images/board_of_directors/'.$boardOfDirector->image) }}" width="60" style="border-radius:50%;">
                            </small>
                        @endif
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Order</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $boardOfDirector->order) }}" min="0">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Status</label>
                        <select name="is_active" class="form-control">
                            <option value="1" {{ $boardOfDirector->is_active ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$boardOfDirector->is_active ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Member</button>
            </form>
        </div>
    </div>
</div>
@endsection