@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">All Team Members</h6>
            <a href="{{ route('team.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add Team Member
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
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
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Order</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $member)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $member->order }}</td>
                                    <td class="align-middle">
                                        @if($member->photo)
                                            <img src="{{ asset('images/team_members/'.$member->photo) }}" alt="" width="50" class="rounded">
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $member->name }}</td>
                                    <td class="align-middle">{{ $member->designation }}</td>
                                    <td class="align-middle">{{ $member->department ?? '-' }}</td>
                                    <td class="align-middle">
                                        @if($member->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('team.edit', $member->id) }}" class="btn btn-sm btn-primary text-white">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('team.delete', $member->id) }}" class="btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to delete this member?');">
                                            <i class="fadeIn animated bx bx-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">No team members found.</td>
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
