@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Policy & Guideline</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-danger">
                        {{ session()->get('success') }}
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
                        <table class="table">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        {{ Str::limit($value->name, 30, '...') }}
                                    </td>
                                    <td>
                                        {{ $value->file }}
                                    </td>
                                    <td>
                                        <a href="{{ route('policy.edit',$value->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('policy.delete',$value->id) }}" class="btn btn-sm btn-danger text-white text-center">
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
</div>

@endsection
