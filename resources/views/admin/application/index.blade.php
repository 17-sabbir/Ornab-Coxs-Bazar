@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">Applications</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">
                        {{ session()->get('update') }}
                    </div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Logo</th>
                                <th>Favicon</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Youtube</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $key=>$data)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">
                                    @if(!empty($data->main_logo) && file_exists(public_path('images/application/'.$data->main_logo)))
                                        <img src="{{ asset('images/application/'.$data->main_logo) }}" alt="Logo" width="50" class="border rounded p-1">
                                    @else
                                        <span class="badge bg-secondary">No Logo</span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if(!empty($data->fav_icon) && file_exists(public_path('images/application/'.$data->fav_icon)))
                                        <img src="{{ asset('images/application/'.$data->fav_icon) }}" alt="Favicon" width="50" class="border rounded p-1">
                                    @else
                                        <span class="badge bg-secondary">No Icon</span>
                                    @endif
                                </td>
                                <td class="align-middle">{{ $data->facebook ?? '-' }}</td>
                                <td class="align-middle">{{ $data->twitter ?? '-' }}</td>
                                <td class="align-middle">{{ $data->instagram ?? '-' }}</td>
                                <td class="align-middle">{{ $data->youtube ?? '-' }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('logo.edit',$data->id) }}" class="btn btn-sm btn-primary text-white text-center" title="Edit">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('logo.delete',$data->id) }}" class="btn btn-sm btn-danger text-white text-center" title="Delete" onclick="return confirm('Are you sure?')">
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

