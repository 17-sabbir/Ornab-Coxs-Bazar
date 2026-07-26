@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Team Member</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('team.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name', $data->name) }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="designation" class="form-label">Designation <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ old('designation', $data->designation) }}">
                            @error('designation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" name="department" class="form-control" id="department" value="{{ $data->department }}">
                        </div>
                        <div class="col-md-6">
                            <label for="order" class="form-label">Display Order</label>
                            <input type="number" name="order" class="form-control" id="order" value="{{ $data->order }}" min="0">
                        </div>
                        <div class="col-md-6">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" id="photo">
                            @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            @if($data->photo)
                                <div class="mt-2">
                                    <img src="{{ asset('images/team_members/'.$data->photo) }}" alt="" width="100" class="border rounded">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $data->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$data->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="bio" class="form-label">Short Bio</label>
                            <textarea name="bio" id="bio" class="form-control" rows="3">{{ $data->bio }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4">{{ $data->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">Facebook URL</label>
                            <input type="url" name="facebook" class="form-control" id="facebook" value="{{ $data->facebook }}">
                        </div>
                        <div class="col-md-6">
                            <label for="twitter" class="form-label">Twitter URL</label>
                            <input type="url" name="twitter" class="form-control" id="twitter" value="{{ $data->twitter }}">
                        </div>
                        <div class="col-md-6">
                            <label for="linkedin" class="form-label">LinkedIn URL</label>
                            <input type="url" name="linkedin" class="form-control" id="linkedin" value="{{ $data->linkedin }}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $data->email }}">
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
