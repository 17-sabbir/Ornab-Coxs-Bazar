@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Volunteer Applications</h1>
    </div>

    <!-- Filter / Search -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.volunteer_applications.index') }}" class="row g-2">
                <div class="col-md-5">
                    <input type="text" class="form-control" name="search" placeholder="Search by name, email or phone" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">All Statuses</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="contacted" {{ request('status') == 'contacted' ? 'selected' : '' }}>Contacted</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>Interest</th>
                            <th>Status</th>
                            <th>Applied At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applications as $app)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $app->name }}</td>
                                <td>{{ $app->phone }}</td>
                                <td>{{ $app->email }}</td>
                                <td>{{ $app->location ?? '—' }}</td>
                                <td>{{ $app->interest ?? '—' }}</td>
                                <td>
                                    <span class="badge badge-{{ $app->status == 'contacted' ? 'success' : ($app->status == 'rejected' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($app->status) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($app->created_at)->format('d M Y, h:i A') }}</td>
                                <td>
                                    <form action="{{ route('admin.volunteer_applications.delete', $app->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this application?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No volunteer applications found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $applications->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
