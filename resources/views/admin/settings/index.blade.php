@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Website Settings</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('settings.update') }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Website Name</label>
                        <input type="text" name="site_name" class="form-control" value="{{ old('site_name', $settings->site_name ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings->contact_email ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Contact Phone</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings->contact_phone ?? '') }}">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="2">{{ old('address', $settings->address ?? '') }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Facebook URL</label>
                        <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Twitter URL</label>
                        <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $settings->twitter ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>LinkedIn URL</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $settings->linkedin ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Instagram URL</label>
                        <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $settings->instagram ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>YouTube URL</label>
                        <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $settings->youtube ?? '') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Google Map Embed Code</label>
                        <textarea name="google_map_embed" class="form-control" rows="3">{{ old('google_map_embed', $settings->google_map_embed ?? '') }}</textarea>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Statistics: Donors</label>
                        <input type="number" name="statistics_donors" class="form-control" value="{{ old('statistics_donors', $settings->statistics_donors ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Statistics: Beneficiaries</label>
                        <input type="number" name="statistics_beneficiaries" class="form-control" value="{{ old('statistics_beneficiaries', $settings->statistics_beneficiaries ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Statistics: Projects</label>
                        <input type="number" name="statistics_projects" class="form-control" value="{{ old('statistics_projects', $settings->statistics_projects ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Statistics: Volunteers</label>
                        <input type="number" name="statistics_volunteers" class="form-control" value="{{ old('statistics_volunteers', $settings->statistics_volunteers ?? 0) }}" min="0">
                    </div>

                    <div class="col-12 mb-3">
                        <label>Footer Text</label>
                        <textarea name="footer_text" class="form-control" rows="2">{{ old('footer_text', $settings->footer_text ?? '') }}</textarea>
                    </div>

                    <div class="col-12 mb-3">
                        <label>Copyright Text</label>
                        <input type="text" name="copyright_text" class="form-control" value="{{ old('copyright_text', $settings->copyright_text ?? '') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Settings
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
