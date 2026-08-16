@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
             <h6 class="mb-0 text-uppercase text-primary font-weight-bold">
                <i class="bx bx-category me-1"></i> Focus Areas
            </h6>
             <a href="{{ route('admin.focus_areas.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add Focus Area
            </a>
        </div>

        <div class="card shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success border-0 bg-success fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-white"><i class='bx bxs-check-circle'></i></div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-white">Success</h6>
                                <div class="text-white">{{ session()->get('success') }}</div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="table-responsive" style="overflow-x: auto;">
                    <div class="focus-area-scroll" style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light" style="position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th width="5%" class="ps-3 text-secondary">#</th>
                                <th width="15%" class="text-secondary">Image</th>
                                <th width="20%" class="text-secondary">Title</th>
                                <th width="35%" class="text-secondary">Description</th>
                                <th width="8%" class="text-secondary">Order</th>
                                <th width="8%" class="text-secondary">Status</th>
                                <th width="12%" class="text-center text-secondary">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($focusAreas as $key => $item)
                            <tr>
                                <td class="ps-3 text-secondary font-weight-bold">{{ ++$key }}</td>
                                <td>
                                    @if ($item->image_path)
                                    <div class="p-1 border rounded bg-white d-inline-block shadow-sm">
                                        <img src="{{ asset('storage/' . $item->image_path) }}" class="rounded" alt="focus area image" width="70" height="50" style="object-fit: cover;">
                                    </div>
                                    @else
                                    <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <h6 class="mb-0 text-dark font-weight-bold" style="font-size: 15px;">{{ $item->title }}</h6>
                                </td>
                                <td class="text-muted">
                                    {{ Str::limit($item->description, 60, '...') }}
                                </td>
                                <td class="text-muted">{{ $item->order }}</td>
                                <td>
                                    @if ($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.focus_areas.edit', $item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('admin.focus_areas.destroy', $item->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this focus area?');">
                                            <i class="bx bx-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(count($focusAreas) < 1)
                        <div class="text-center py-5">
                            <div class="mb-3 text-muted opacity-25">
                                <i class="bx bx-category" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="text-muted">No Focus Areas Found</h5>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
