@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
		<div class="d-flex justify-content-between align-items-center mb-3">
			<h6 class="mb-0 text-uppercase">All FAQ</h6>
			<a href="{{ route('faq.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
				<i class="bx bx-plus-circle me-1"></i> Add FAQ
			</a>
		</div>
		<hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Question</th>
                                <th>Order</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=>$item)
                            <tr>
                                <td class="align-middle">{{ ++$key }}</td>
                                <td class="align-middle">{{ $item->question }}</td>
                                <td class="align-middle">{{ $item->order }}</td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('faq.edit',$item->id) }}" class="btn btn-sm btn-primary text-white text-center">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('faq.delete',$item->id) }}" class="btn btn-sm btn-danger text-white text-center">
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
