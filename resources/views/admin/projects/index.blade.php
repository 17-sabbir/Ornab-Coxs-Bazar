@extends('layouts.admin')

@section('content')
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Projects</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">Add New Project</a>
    </div>
    <div class="card-body pb-0">
        <div class="btn-group mb-3" role="group" aria-label="Filter by status">
            <a href="{{ route('admin.projects.index') }}"
               class="btn btn-sm {{ is_null($status) ? 'btn-primary' : 'btn-outline-primary' }}">All</a>
            <a href="{{ route('admin.projects.index', ['status' => 'ongoing']) }}"
               class="btn btn-sm {{ $status === 'ongoing' ? 'btn-primary' : 'btn-outline-primary' }}">Ongoing</a>
            <a href="{{ route('admin.projects.index', ['status' => 'completed']) }}"
               class="btn btn-sm {{ $status === 'completed' ? 'btn-primary' : 'btn-outline-primary' }}">Completed (Archive)</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="max-height: 70vh; overflow: auto;">
            <table class="table table-striped table-hover text-nowrap" style="min-width: 1100px;">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Locations</th>
                        <th>Donors</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->locations }}</td>
                        <td>{{ $project->donors }}</td>
                        <td>{{ project_period($project) }}</td>
                        <td>
                            <span class="badge bg-{{ $project->status == 'ongoing' ? 'success' : 'secondary' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-info">Edit</a>

                            <form action="{{ route('admin.projects.toggle-status', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Change status?')">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-warning">
                                    {{ $project->status === 'ongoing' ? 'Complete' : 'Continue' }}
                                </button>
                            </form>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
