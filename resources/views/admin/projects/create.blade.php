@extends('layouts.admin')

@section('title')
Create Project
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Project</h5>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-light btn-sm text-danger fw-bold">Back to List</a>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                     <ul class="nav nav-tabs mb-4" id="projectTabs" role="tablist">
                         <li class="nav-item"><button class="nav-link active" id="en-tab" data-bs-toggle="tab" data-bs-target="#en" type="button">English</button></li>
                         <li class="nav-item"><button class="nav-link" id="media-tab" data-bs-toggle="tab" data-bs-target="#media" type="button">Media</button></li>
                         <li class="nav-item"><button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button">Details</button></li>
                         <li class="nav-item"><button class="nav-link" id="reports-tab" data-bs-toggle="tab" data-bs-target="#reports" type="button">Reports</button></li>
                     </ul>

                    <div class="tab-content">
                        <!-- English -->
                        <div class="tab-pane fade show active" id="en">
                            <div class="mb-3">
                                <label class="form-label">Project Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="project_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Objectives</label>
                                <textarea class="form-control" name="objectives" rows="5"></textarea>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="tab-pane fade" id="media">
                            <div class="mb-3">
                                <label class="form-label">Cover Image</label>
                                <input type="file" class="form-control" name="cover_image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gallery Images (multiple)</label>
                                <input type="file" class="form-control" name="galleries[]" multiple accept="image/*">
                                <small class="text-muted">You can select multiple images at once.</small>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="tab-pane fade" id="details">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Locations</label>
                                    <input type="text" class="form-control" name="locations">
                                </div>
                                <div class="col-md-6 mb-3">
                                    @php $years = range((int) date('Y') + 5, 1990); @endphp
                                    <label class="form-label">Project Period</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <select class="form-control" name="start_year" required>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}" {{ (int) date('Y') === (int) $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-control" name="end_year">
                                                <option value="continue" selected>Continue</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Donors</label>
                                    <input type="text" class="form-control" name="donors">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total Beneficiary</label>
                                    <input type="text" class="form-control" name="total_beneficiary">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option value="ongoing">Ongoing Project</option>
                                        <option value="completed">Completed Project</option>
                                        <option value="success_story">Success Story</option>
                                        <option value="case_study">Case Study</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Priority</label>
                                    <input type="number" class="form-control" name="priority" value="0" min="0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remark</label>
                                <textarea class="form-control" name="remark" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- Reports -->
                        <div class="tab-pane fade" id="reports">
                            <div class="mb-3">
                                <label class="form-label">Upload Report (PDF)</label>
                                <input type="file" name="report_file" class="form-control" accept="application/pdf">
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-danger">Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#category').on('change', function() {
        var val = $(this).val();
        if (val === 'ongoing') $('#status').val('ongoing');
        else if (val === 'completed' || val === 'success_story' || val === 'case_study') $('#status').val('completed');
    });
});
</script>
@endpush
