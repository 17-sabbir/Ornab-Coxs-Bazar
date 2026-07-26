@extends('layouts.admin')

@section('content')
<div class="card shadow-sm border-0 rounded-3">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="mb-0">Donation Campaigns</h5>
                <small class="text-muted">Manage donation campaigns and purposes.</small>
            </div>
            <a href="{{ route('admin.donation_campaigns.create') }}" class="btn btn-primary btn-sm">Add Campaign</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Order</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($campaigns as $campaign)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $campaign->title }}</td>
                            <td>{{ $campaign->purpose ?? '—' }}</td>
                            <td><span class="badge bg-{{ $campaign->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($campaign->status) }}</span></td>
                            <td>{{ $campaign->order }}</td>
                            <td>
                                <a href="{{ route('admin.donation_campaigns.edit', $campaign->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                <form action="{{ route('admin.donation_campaigns.destroy', $campaign->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this campaign?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">No campaigns found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
