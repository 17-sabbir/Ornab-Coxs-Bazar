@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Slider</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $slider->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="title_bn" class="form-label">Title (Bangla)</label>
                            <input type="text" name="title_bn" class="form-control @error('title_bn') is-invalid @enderror" id="title_bn" value="{{ $slider->title_bn }}">
                            @error('title_bn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="img">
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Old Image:</label>
                            <img src="{{ asset('images/slider/'.$slider->image) }}" alt="" width="100">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $slider->description }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description_bn" class="form-label">Description (Bangla)</label>
                            <textarea id="description_bn" name="description_bn" class="form-control @error('description_bn') is-invalid @enderror" rows="3">{{ $slider->description_bn }}</textarea>
                            @error('description_bn')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="order" class="form-label">Order <span class="text-danger">*</span></label>
                            <input type="number" name="order" class="form-control @error('order') is-invalid @enderror" id="order" value="{{ $slider->order }}" placeholder="Enter display order (unique, ascending)" min="1">
                            @error('order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
