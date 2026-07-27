@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">All YouTube Videos</h6>
            <a href="{{ route('youtube.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add Video
            </a>
        </div>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @php
                    function youtube_id_from_url($url){
                        if(!$url) return null;
                        if(preg_match('/(?:v=|embed\/|youtu\.be\/)([A-Za-z0-9_\-]+)/', $url, $m)){
                            return $m[1];
                        }
                        return null;
                    }
                @endphp
                @if ($videos->count())
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
                    <div class="row">
                        @foreach ($videos as $v)
                            @php
                                $vid = youtube_id_from_url($v->youtube_link);
                                $embed = $vid ? 'https://www.youtube.com/embed/'.$vid : null;
                            @endphp
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="card h-100">
                                    @if ($embed)
                                        <div class="ratio ratio-16x9">
                                            <iframe src="{{ $embed }}" title="{{ $v->title ?? 'YouTube video' }}" allowfullscreen></iframe>
                                        </div>
                                    @else
                                        <div class="ratio ratio-16x9 d-flex align-items-center justify-content-center bg-light text-muted">
                                            <i class="bx bx-error-circle bx-lg"></i>
                                        </div>
                                    @endif
                                    <div class="card-body p-3 d-flex flex-column">
                                        <h6 class="card-title mb-1">{{ $v->title ?? 'Untitled' }}</h6>
                                        <p class="mb-2 small text-muted">
                                            Order: {{ $v->order ?? '-' }} &bull; Status:
                                            @if ($v->is_active)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </p>
                                        <div class="mt-auto d-flex gap-1">
                                            <a href="{{ route('youtube.edit', $v->id) }}" class="btn btn-sm btn-primary text-white" title="Edit">
                                                <i class="fadeIn animated bx bx-edit"></i>
                                            </a>
                                            <a href="{{ route('youtube.delete', $v->id) }}" class="btn btn-sm btn-danger text-white" title="Delete">
                                                <i class="fadeIn animated bx bx-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bx bxl-youtube bx-lg text-muted"></i>
                        <p class="mt-2 text-muted">No videos found. <a href="{{ route('youtube.add') }}">Add your first video</a></p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
