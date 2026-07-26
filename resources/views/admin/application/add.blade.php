@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Application Settings</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('logo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="site_name" class="form-label">Website Name</label>
                            <input type="text" name="site_name" class="form-control" id="site_name" value="{{ isset($application->site_name)? $application->site_name:'' }}" placeholder="Ornab Cox's Bazar">
                        </div>
                        <div class="col-md-6">
                            <label for="copyright_text" class="form-label">Copyright</label>
                            <input type="text" name="copyright_text" class="form-control" id="copyright_text" value="{{ isset($application->copyright_text)? $application->copyright_text:'' }}" placeholder="© 2026 Ornab Cox's Bazar">
                        </div>
                        <div class="col-md-6">
                            <label for="contact_email" class="form-label">Contact Email</label>
                            <input type="email" name="contact_email" class="form-control" id="contact_email" value="{{ isset($application->contact_email)? $application->contact_email:'' }}" placeholder="info@ornabcxsbazar.org">
                        </div>
                        <div class="col-md-6">
                            <label for="contact_phone" class="form-label">Contact Phone</label>
                            <input type="text" name="contact_phone" class="form-control" id="contact_phone" value="{{ isset($application->contact_phone)? $application->contact_phone:'' }}" placeholder="+880 1XXX-XXXXXX">
                        </div>
                        <div class="col-12">
                            <label for="footer_text" class="form-label">Footer Text</label>
                            <textarea name="footer_text" id="footer_text" rows="3" class="form-control" placeholder="Short description displayed in the footer">{{ isset($application->footer_text)? $application->footer_text:'' }}</textarea>
                        </div>
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
                            <input type="file" name="main_logo" class="form-control @error('logo') is-invalid @enderror" id="logo">
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
                            <input type="file" name="fev_icon" class="form-control @error('fav') is-invalid @enderror" id="fav">
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
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-info">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-2 h6 text-end py-1">Facebook Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->facebook)? $application->facebook:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Twitter Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->twitter)? $application->twitter:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Instagram Link : </div>
                    <div class="col-md-10 h6 text-justify py-1">
                        {{ isset($application->instagram)? $application->instagram:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Youtube Link : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->youtube)? $application->youtube:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Website Name : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->site_name)? $application->site_name:'Ornab Cox\'s Bazar' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Footer Text : </div>
                    <div class="col-md-10 h6 py-1">
                        {{ isset($application->footer_text)? $application->footer_text:'' }}
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Main Logo: </div>
                    <div class="col-md-10 py-1">
                        @if(!empty($application->main_logo) && file_exists(public_path('images/application/'.$application->main_logo)))
                            <img src="{{ asset('images/application/'.$application->main_logo) }}" alt="Main Logo" width="100" class="border rounded p-1">
                            <span class="badge bg-success ms-2">Dynamic</span>
                        @else
                            <img src="{{ asset('images/application/ornab-logo.png') }}" alt="Default Logo" width="100" class="border rounded p-1 opacity-75">
                            <span class="badge bg-secondary ms-2">Default (Static)</span>
                        @endif
                    </div>

                    <div class="col-md-2 h6 text-end py-1">Fav Icon: </div>
                    <div class="col-md-10 py-1">
                        @if(!empty($application->fav_icon) && file_exists(public_path('images/application/'.$application->fav_icon)))
                            <img src="{{ asset('images/application/'.$application->fav_icon) }}" alt="Favicon" width="50" class="border rounded p-1">
                            <span class="badge bg-success ms-2">Dynamic</span>
                        @else
                            <img src="{{ asset('images/application/ornab-logo.png') }}" alt="Default Favicon" width="50" class="border rounded p-1 opacity-75">
                            <span class="badge bg-secondary ms-2">Default (Static)</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
