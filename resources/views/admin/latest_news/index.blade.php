@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <!-- Header with Action -->
        <div class="d-flex justify-content-between align-items-center mb-3">
             <h6 class="mb-0 text-uppercase text-primary font-weight-bold">
                <i class="bx bx-news me-1"></i> Latest News
            </h6>
             <a href="{{ route('news.add') }}" class="btn btn-primary btn-sm rounded-pill px-3">
                <i class="bx bx-plus-circle me-1"></i> Add News
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
                @if (session()->has('update'))
                    <div class="alert alert-info border-0 bg-info fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class='bx bxs-info-circle'></i></div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Updated</h6>
                                <div class="text-dark">{{ session()->get('update') }}</div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Scrollable Table Container -->
                <div class="table-responsive" style="overflow-x: auto;">
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
                    <div class="focus-area-scroll" style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-light" style="position: sticky; top: 0; z-index: 10;">
                            <tr>
                                <th width="5%" class="ps-3 text-secondary">#</th>
                                <th width="15%" class="text-secondary">Image</th>
                                <th width="20%" class="text-secondary">Title</th>
                                <th width="15%" class="text-secondary">Date</th>
                                <th width="30%" class="text-secondary">Description</th>
                                <th width="15%" class="text-center text-secondary">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $key => $item)
                            <tr>
                                <td class="ps-3 text-secondary font-weight-bold">{{ ++$key }}</td>
                                <td>
                                    <div class="p-1 border rounded bg-white d-inline-block shadow-sm">
                                        <img src="{{ asset('images/news/'.$item->image) }}" class="rounded" alt="news image" width="70" height="50" style="object-fit: cover;">
                                    </div>
                                </td>
                                <td>
                                    <h6 class="mb-0 text-dark font-weight-bold" style="font-size: 15px;">{{ $item->title }}</h6>
                                </td>
                                <td class="text-muted">
                                    {{ $item->news_date ? \Carbon\Carbon::parse($item->news_date)->format('d M, Y') : 'N/A' }}
                                </td>
                                <td class="text-muted">
                                    {{ Str::limit($item->description, 60, '...') }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('news.edit',$item->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="{{ route('news.delete',$item->id) }}" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this news item?');">
                                            <i class="bx bx-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(count($news) < 1)
                        <div class="text-center py-5">
                            <div class="mb-3 text-muted opacity-25">
                                <i class="bx bx-news" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="text-muted">No News Found</h5>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
