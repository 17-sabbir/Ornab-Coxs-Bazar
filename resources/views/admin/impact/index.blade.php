@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Impact Matrix</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <p class="text-muted mb-4">These four numbers are displayed on the homepage <strong>"Our Impact"</strong> section.</p>

            <form method="POST" action="{{ route('admin.impact.update') }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label>Donors</label>
                        <input type="number" name="statistics_donors" class="form-control" value="{{ old('statistics_donors', $settings->statistics_donors ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Beneficiaries</label>
                        <input type="number" name="statistics_beneficiaries" class="form-control" value="{{ old('statistics_beneficiaries', $settings->statistics_beneficiaries ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Projects</label>
                        <input type="number" name="statistics_projects" class="form-control" value="{{ old('statistics_projects', $settings->statistics_projects ?? 0) }}" min="0">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>Volunteers</label>
                        <input type="number" name="statistics_volunteers" class="form-control" value="{{ old('statistics_volunteers', $settings->statistics_volunteers ?? 0) }}" min="0">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Impact
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
