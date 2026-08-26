@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Financial &amp; Audit Report</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('admin.financial_statements.update', $financialStatement->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $financialStatement->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="year" class="form-label">Financial Year <span class="text-danger">*</span></label>
                            <input type="text" name="year" class="form-control @error('year') is-invalid @enderror" id="year" value="{{ old('year', $financialStatement->year) }}" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" inputmode="numeric">
                            @error('year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $financialStatement->order }}" min="0">
                        </div>
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">Status</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $financialStatement->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$financialStatement->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">PDF / Document</label>
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" id="file">
                            @if($financialStatement->file_path)
                                <a href="{{ asset('storage/'.$financialStatement->file_path) }}" target="_blank" class="small">Current file</a>
                            @endif
                            @error('file')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cover_image" class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image">
                            @if($financialStatement->cover_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$financialStatement->cover_image) }}" alt="" width="100" class="border rounded">
                                </div>
                            @endif
                            @error('cover_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $financialStatement->description }}</textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
