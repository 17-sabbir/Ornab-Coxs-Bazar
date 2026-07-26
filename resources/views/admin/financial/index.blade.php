@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">All Financial Statements</h6>
            <a href="{{ route('admin.financial_statements.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add Financial Statement
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Year</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>File</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($statements as $statement)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($statement->cover_image)
                                            <img src="{{ asset('storage/'.$statement->cover_image) }}" alt="" width="50" class="rounded">
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>{{ $statement->title }}</td>
                                    <td>{{ $statement->year }}</td>
                                    <td>{{ $statement->order }}</td>
                                    <td>
                                        @if($statement->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($statement->file_path)
                                            <a href="{{ asset('storage/'.$statement->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.financial_statements.edit', $statement->id) }}" class="btn btn-sm btn-primary text-white">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.financial_statements.destroy', $statement->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete this statement?');">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">No financial statements found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
