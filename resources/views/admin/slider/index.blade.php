@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h6 class="mb-0 text-uppercase">All Slider</h6>
			<a href="{{ route('slider.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
				<i class="bx bx-plus-circle me-1"></i> Add Slider
			</a>
		</div>
		<hr/>
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="table-responsive" style="max-height: 500px; overflow: auto;">
                        <table class="table table-hover table-striped" style="white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Order</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slider as $key => $slide)
                                <tr>
                                    <td class="align-middle">{{ ++$key }}</td>
                                    <td class="align-middle">{{ $slide->order }}</td>
                                    <td class="align-middle">{{ $slide->title }}</td>
                                    <td class="align-middle">
                                        <img src="{{ asset('images/slider/'.$slide->image) }}" alt="" width="50">
                                    </td>
                                    <td class="align-middle">{{ Str::limit($slide->description,30,'..' )}}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('slider.edit',$slide->id) }}" class="btn btn-sm btn-primary text-white">
                                            <i class="fadeIn animated bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('slider.delete',$slide->id) }}" class="btn btn-sm btn-danger text-white">
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
