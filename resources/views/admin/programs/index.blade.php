@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0 text-uppercase">Focus Area</h6>
            <a href="{{ route('programs.add') }}" class="btn btn-primary btn-sm">
                <i class='bx bx-plus'></i> Add New
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-danger">
                        {{ session()->get('update') }}
                    </div>
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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/programs/'.$item->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">
                                    <span class="badge bg-{{ $item->status == 'active' ? 'success' : ($item->status == 'completed' ? 'secondary' : 'info') }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td class="align-middle">{{ $item->start_date }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('programs.edit',$item->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                        <a href="{{ route('programs.delete',$item->id) }}" class="btn btn-sm btn-danger text-white text-center">
                                        <i class="fadeIn animated bx bx-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
