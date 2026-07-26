@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h6 class="mb-0 text-uppercase">All Photo Gallery</h6>
			<a href="{{ route('gallery.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
				<i class="bx bx-plus-circle me-1"></i> Add Photo
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
                <div class="p-4 border rounded table-responsive" style="overflow-x:auto;">
                    <table class="table table-hover table-striped" style="min-width: 900px;">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Album</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $key=>$gallery)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $gallery->album ?? 'General' }}</td>
                                <td class="align-middle">{{ $gallery->title }}</td>
                                <td class="align-middle">
                                    <img src="{{ asset('images/gallery/'.$gallery->image) }}" alt="" width="50">
                                </td>
                                <td class="align-middle">{{ $gallery->description }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('gallery.edit',$gallery->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('gallery.delete',$gallery->id) }}" class="btn btn-sm btn-danger text-white text-center" onclick="return confirm('Are you sure you want to delete this item?');">
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
