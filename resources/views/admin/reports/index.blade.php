@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">All Annual Reports</h6>
            <a href="{{ route('admin.annual_reports.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add Annual Report
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <style>
                        .focus-area-scroll::-webkit-scrollbar {
                            width: 8px;
                        }
                        .focus-area-scroll::-webkit-scrollbar-track {
                            background: #f1f1f1;
                            border-radius: 4px;
                        }
                        .focus-area-scroll::-webkit-scrollbar-thumb {
                            background: #888;
                            border-radius: 4px;
                        }
                        .focus-area-scroll::-webkit-scrollbar-thumb:hover {
                            background: #555;
                        }
                    </style>
                    <div class="focus-area-scroll" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-hover table-striped align-middle">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Reporting Year</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($report->cover_image)
                                            <img src="{{ asset('storage/'.$report->cover_image) }}" alt="" width="50" class="rounded">
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>{{ $report->title }}</td>
                                    <td>{{ $report->year }}</td>
                                    <td>{{ $report->order }}</td>
                                    <td>
                                        @if($report->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($report->file_path)
                                            <a href="{{ asset('storage/'.$report->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.annual_reports.edit', $report->id) }}" class="btn btn-sm btn-primary text-white">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.annual_reports.destroy', $report->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete this report?');">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">No annual reports found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
