@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">View Message</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="p-4 border rounded">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                        <div class="avatar-circle bg-primary text-white fw-bold d-flex align-items-center justify-content-center" style="width:56px;height:56px;border-radius:50%;font-size:1.25rem;">
                            {{ strtoupper(substr($message->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="mb-1">{{ $message->name }}</h5>
                            <div class="text-muted small">
                                <i class="bx bx-envelope me-1"></i> {{ $message->email }}
                            </div>
                        </div>
                        <div class="ms-auto text-end">
                            @if(isset($message->is_read) && $message->is_read)
                                <span class="badge bg-secondary">Read</span>
                            @else
                                <span class="badge bg-warning text-dark">Unread</span>
                            @endif
                            @if(!empty($message->replied_at))
                                <span class="badge bg-success ms-1">Replied</span>
                            @else
                                <span class="badge bg-light text-dark border ms-1">Not Replied</span>
                            @endif
                            <div class="text-muted small mt-1">
                                <i class="bx bx-time-five me-1"></i> {{ $message->created_at ? \Carbon\Carbon::parse($message->created_at)->format('d M Y, h:i A') : '' }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <span class="text-uppercase small text-muted fw-bold">Subject</span>
                        <h6 class="fw-bold mt-1">{{ $message->subject }}</h6>
                    </div>

                    <div class="mb-4">
                        <span class="text-uppercase small text-muted fw-bold">Message</span>
                        <div class="mt-2 p-3 bg-light rounded" style="white-space: pre-wrap;">{{ $message->message }}</div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Reply to User (will be sent to email)</h6>
                    @if(!empty($message->reply_message))
                        <div class="alert alert-info">
                            <div><strong>Last Reply Subject:</strong> {{ $message->reply_subject }}</div>
                            <div><strong>Last Replied At:</strong> {{ $message->replied_at ? \Carbon\Carbon::parse($message->replied_at)->format('d M Y, h:i A') : '' }}</div>
                            <div class="mt-2" style="white-space: pre-wrap;">{{ $message->reply_message }}</div>
                        </div>
                    @endif

                    <form action="{{ route('message.reply', $message->id) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <input type="text" name="reply_subject" class="form-control @error('reply_subject') is-invalid @enderror" placeholder="Reply Subject" value="{{ old('reply_subject', 'Re: '.$message->subject) }}">
                            @error('reply_subject')
                                <div class="text-danger">{{ $errors->first('reply_subject') }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="reply_message" rows="5" class="form-control @error('reply_message') is-invalid @enderror" placeholder="Type your reply...">{{ old('reply_message') }}</textarea>
                            @error('reply_message')
                                <div class="text-danger">{{ $errors->first('reply_message') }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Send Reply</button>
                        <a href="{{ route('message.index') }}" class="btn btn-outline-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
