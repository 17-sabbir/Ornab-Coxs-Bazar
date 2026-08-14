@extends('layouts.admin')

@section('title')
Edit Project
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Project</h5>
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
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                <input type="text" class="form-control" name="project_name" value="{{ $project->project_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Objectives</label>
                                <textarea class="form-control" name="objectives" rows="5">{{ $project->objectives }}</textarea>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="tab-pane fade" id="media">
                            <div class="mb-3">
                                <label class="form-label">Cover Image</label>
                                <input type="file" class="form-control" name="cover_image" accept="image/*">
                                @if(!empty($project->cover_image))
                                    <div class="mt-2">
                                        <img src="{{ asset('images/project/'.$project->cover_image) }}" width="120" class="border rounded">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Main Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                @if(!empty($project->image))
                                    <div class="mt-2">
                                        <img src="{{ asset('images/project/'.$project->image) }}" width="120" class="border rounded">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Add Gallery Images (multiple)</label>
                                <input type="file" class="form-control" name="galleries[]" multiple accept="image/*">
                            </div>
                            @if($project->galleries->count() > 0)
                                <div class="row mt-3">
                                    @foreach($project->galleries as $gallery)
                                    <div class="col-md-3 mb-2">
                                        <div class="position-relative border rounded p-1">
                                            <img src="{{ asset('images/project/'.$gallery->image) }}" width="100%" style="height:100px;object-fit:cover;">
                                            <a href="{{ route('admin.projects.delete-gallery', $gallery->id) }}" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="return confirm('Delete this image?')">&times;</a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Details -->
                        <div class="tab-pane fade" id="details">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Locations</label>
                                    <input type="text" class="form-control" name="locations" value="{{ $project->locations }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    @php
                                        $years = range((int) date('Y') + 5, 1990);
                                        $startYear = $project->start_year ?? ((int) date('Y'));
                                        $isContinuing = $project->status === 'ongoing';
                                        $endYear = $project->end_year;
                                    @endphp
                                    <label class="form-label">Project Period</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <select class="form-control" name="start_year" required>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}" {{ (int) $startYear === (int) $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select class="form-control" name="end_year">
                                                <option value="continue" {{ $isContinuing ? 'selected' : '' }}>Continue</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year }}" {{ (!$isContinuing && (int) $endYear === (int) $year) ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Donors</label>
                                    <input type="text" class="form-control" name="donors" value="{{ $project->donors }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Total Beneficiary</label>
                                    <input type="text" class="form-control" name="total_beneficiary" value="{{ $project->total_beneficiary }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="ongoing" {{ $project->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select Category</option>
                                        <option value="ongoing" {{ $project->category == 'ongoing' ? 'selected' : '' }}>Ongoing Project</option>
                                        <option value="completed" {{ $project->category == 'completed' ? 'selected' : '' }}>Completed Project</option>
                                        <option value="success_story" {{ $project->category == 'success_story' ? 'selected' : '' }}>Success Story</option>
                                        <option value="case_study" {{ $project->category == 'case_study' ? 'selected' : '' }}>Case Study</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Priority</label>
                                    <input type="number" class="form-control" name="priority" value="{{ $project->priority ?? 0 }}" min="0">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Remark</label>
                                <textarea class="form-control" name="remark" rows="2">{{ $project->remark }}</textarea>
                            </div>
                        </div>

                        <!-- Reports -->
                        <div class="tab-pane fade" id="reports">
                            <div class="mb-3">
                                <label class="form-label">Upload Report (PDF)</label>
                                <input type="file" name="report_file" class="form-control" accept="application/pdf">
                                <small class="text-muted">Select a PDF file and click Update Project to save.</small>
                            </div>

                            @if($project->reports->count() > 0)
                                <h6 class="fw-bold mb-2">Existing Reports</h6>
                                <ul class="list-group">
                                    @foreach($project->reports as $report)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a href="{{ asset('images/project/reports/'.$report->file) }}" target="_blank" class="text-decoration-none">{{ $report->file }}</a>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                onclick="deleteReport('{{ route('admin.projects.reports.destroy', $report->id) }}')">Delete</button>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-danger">Update Project</button>
                    </div>
                </form>

                <!-- Standalone form for deleting a report (kept OUTSIDE the edit form above -->
                <!-- to avoid invalid nested <form> tags, which break the main submit button). -->
                <form id="deleteReportForm" method="POST" style="display:none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteReport(url) {
        if (!confirm('Delete this report?')) return;
        const form = document.getElementById('deleteReportForm');
        form.action = url;
        form.submit();
    }
</script>
@endsection