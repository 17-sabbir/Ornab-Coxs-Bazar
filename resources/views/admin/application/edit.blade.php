@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Application Settings</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('logo.update', $application->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="logo" class="form-label">Logo</label>
                            @if(!empty($application->main_logo) && file_exists(public_path('images/application/'.$application->main_logo)))
                                <div class="mb-2">
                                    <span class="text-muted small">Current Logo:</span><br>
                                    <img src="{{ asset('images/application/'.$application->main_logo) }}" alt="Current Logo" height="50" class="border rounded p-1">
                                </div>
                            @else
                                <div class="mb-2">
                                    <span class="text-muted small">Current Logo (default):</span><br>
                            <img src="{{ asset('images/application/ornab-logo.png') }}" alt="Default Logo" height="50" class="border rounded p-1">
                                </div>
                            @endif
                            <input type="file" name="main_logo" class="form-control @error('main_logo') is-invalid @enderror" id="logo">
                            @error('main_logo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="fav" class="form-label">Favicon</label>
                            @if(!empty($application->fav_icon) && file_exists(public_path('images/application/'.$application->fav_icon)))
                                <div class="mb-2">
                                    <span class="text-muted small">Current Favicon:</span><br>
                                    <img src="{{ asset('images/application/'.$application->fav_icon) }}" alt="Current Favicon" height="32" class="border rounded p-1">
                                </div>
                            @else
                                <div class="mb-2">
                                    <span class="text-muted small">Current Favicon (default):</span><br>
                            <img src="{{ asset('images/application/ornab-logo.png') }}" alt="Default Favicon" height="32" class="border rounded p-1">
                                </div>
                            @endif
                            <input type="file" name="fev_icon" class="form-control @error('fev_icon') is-invalid @enderror" id="fav">
                            @error('fev_icon')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="fb" class="form-label">Facebook Link</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" id="fb" value="{{ isset($application->facebook)? $application->facebook:'' }}" placeholder="Enter Facebook Link">
                            @error('fb')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="twitter" class="form-label">Twitter Link</label>
                            <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="twitter" placeholder="Enter Twitter Link" value="{{ isset($application->twitter)?$application->twitter:'' }}">
                            @error('twitter')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="insta" class="form-label">Instagram Link</label>
                            <input type="text" name="insta" class="form-control @error('insta') is-invalid @enderror" id="insta" placeholder="Enter Instagram Link" value="{{ isset($application->instagram)?$application->instagram:'' }}">
                            @error('insta')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="youtube" class="form-label">Youtube Link</label>
                            <input type="text" name="youtube" class="form-control @error('youtube') is-invalid @enderror" id="youtube" placeholder="Enter Youtube Link" value="{{ isset($application->youtube)?$application->youtube:'' }}">
                            @error('youtube')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('logo.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
