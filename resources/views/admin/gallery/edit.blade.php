@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Edit Photo Gallery</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session()->get('update') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ route('gallery.update',$gallery->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="album_select" class="form-label">Album Name</label>
                            <select name="album_select" id="album_select" class="form-select @error('album') is-invalid @enderror">
                                <option value="">-- Select Album --</option>
                                <option value="__new__">+ New Album</option>
                            </select>
                            <div id="new_album_wrapper" style="display: none; margin-top: 10px;">
                                <input type="text" name="album" class="form-control @error('album') is-invalid @enderror" id="album" value="{{ old('album') }}" placeholder="Enter new album name">
                            </div>
                            <input type="hidden" name="album" id="album_hidden" value="{{ $gallery->album }}">
                            @error('album')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $gallery->title }}">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="img">
                            <span class="text-info">You can upload image of any dimension and size.</span>
                        </div>
                        <div class="col-md-12">
                            <label for="img" class="form-label">Old Image:</label>
                            <img src="{{ asset('images/gallery/'.$gallery->image) }}" alt="" width="100">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="3">
                                {{ $gallery->description }}
                            </textarea>
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

@push('scripts')
<script>
$(document).ready(function() {
    var currentAlbum = '{{ $gallery->album }}';

    // Load existing albums via AJAX
    $.get('{{ route("gallery.albums") }}', function(data) {
        var select = $('#album_select');
        var found = false;

        $.each(data, function(i, album) {
            var selected = (album === currentAlbum) ? 'selected' : '';
            if (album === currentAlbum) found = true;
            select.append('<option value="' + album + '" ' + selected + '>' + album + '</option>');
        });

        // If current album is not in the list, pre-select __new__ and show the input
        if (!found && currentAlbum && currentAlbum !== '') {
            $('#album_select').val('__new__');
            $('#new_album_wrapper').show();
            $('#album').val(currentAlbum);
        }

        // Update hidden input based on selection
        var selectVal = $('#album_select').val();
        if (selectVal !== '__new__' && selectVal !== '') {
            $('#album_hidden').val(selectVal);
        }
    });

    // Handle dropdown change
    $('#album_select').on('change', function() {
        var val = $(this).val();
        if (val === '__new__') {
            $('#new_album_wrapper').show();
            $('#album_hidden').val('');
        } else if (val !== '') {
            $('#new_album_wrapper').hide();
            $('#album_hidden').val(val);
        } else {
            $('#new_album_wrapper').hide();
            $('#album_hidden').val('');
        }
    });

    // On form submit, ensure the correct album value is sent
    $('form').on('submit', function() {
        var selectVal = $('#album_select').val();
        if (selectVal === '__new__') {
            var newAlbum = $('#album').val().trim();
            if (newAlbum === '') {
                alert('Please enter a new album name.');
                return false;
            }
            $('#album_hidden').val(newAlbum);
        }
        // Disable the select so it doesn't submit its value
        $('#album_select').prop('disabled', true);
    });
});
</script>
@endpush