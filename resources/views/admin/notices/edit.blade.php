@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Notice</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('notices.update',$notice->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $notice->title) }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="notice_no" class="form-label">Notice No</label>
                            <input type="text" name="notice_no" class="form-control @error('notice_no') is-invalid @enderror" id="notice_no" value="{{ old('notice_no', $notice->notice_no) }}">
                            @error('notice_no')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="publish_date" class="form-label">Publish Date</label>
                            <input type="date" name="publish_date" class="form-control @error('publish_date') is-invalid @enderror" id="publish_date" value="{{ old('publish_date', $notice->publish_date) }}" required>
                            @error('publish_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        @if ($notice->image)
                        <div class="col-md-12">
                            <label class="form-label">Old Image:</label><br>
                            <img src="{{ asset('images/notices/'.$notice->image) }}" alt="" width="100">
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="attachment" class="form-label">Attachment (PDF, DOC)</label>
                            <input type="file" name="attachment" class="form-control" id="attachment">
                        </div>
                        @if ($notice->attachment)
                        <div class="col-md-12">
                            <label class="form-label">Old Attachment:</label><br>
                            <a href="{{ asset('images/notices/'.$notice->attachment) }}" target="_blank">Download Current File</a>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $notice->description) }}</textarea>
                            @error('description')
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
