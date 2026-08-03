@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Board of Directors</h1>
        <a href="{{ route('admin.board_of_directors.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Member
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($directors as $key => $director)
                        <tr>
                            <td class="text-center align-middle">{{ $key + 1 }}</td>
                            <td class="text-center align-middle">
                                @if($director->image)
                                    <img src="{{ asset('images/board_of_directors/'.$director->image) }}" width="50" height="50" style="object-fit:cover;border-radius:50%;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td class="align-middle">{{ $director->name }}</td>
                            <td class="align-middle">{{ $director->designation }}</td>
                            <td class="text-center align-middle">{{ $director->order }}</td>
                            <td class="text-center align-middle">
                                @if($director->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="{{ route('admin.board_of_directors.edit', $director) }}" class="btn btn-sm btn-primary" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.board_of_directors.destroy', $director) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this member?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i class="bx bx-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">No board members found.</td>
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