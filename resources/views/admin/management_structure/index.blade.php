@extends('layouts.admin')

@section('content')
<style>
    .ck-editor__editable { min-height: 420px; font-size: .97rem; line-height: 1.9; }
    .ck.ck-toolbar { border-radius: 8px 8px 0 0 !important; }
    .ck.ck-editor__main > .ck-editor__editable { border-radius: 0 0 8px 8px !important; }
</style>
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="mb-0 text-uppercase">Management Structure — Page Content</h6>
        </div>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bx bx-check-circle me-1"></i> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-header" style="background:linear-gradient(135deg,#2E8B66,#1f6b4e); color:#fff;">
                <strong><i class="bx bx-edit me-1"></i> Edit Management Structure Content</strong>
                <small class="ms-2" style="opacity:.85;">Type your content here — use Bold, Heading, List etc. from the editor toolbar.</small>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.management_structure.update') }}" method="POST" id="mgmt-form" enctype="multipart/form-data">
                    @csrf

                    {{-- Page text content --}}
                    <label class="form-label fw-semibold mb-2">Page Content</label>
                    {{-- Hidden textarea — CKEditor writes into this --}}
                    <textarea id="management_content" name="management_content" style="display:none;">{{ $orgProfile->management_content ?? '' }}</textarea>
                    {{-- CKEditor mounts here — must use {!! !!} so saved HTML renders correctly --}}
                    <div id="editor-container">{!! $orgProfile->management_content ?? '' !!}</div>

                    <!-- Organogram PDF upload/display removed -->

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <small class="text-muted"><i class="bx bx-info-circle me-1"></i>Type directly in English. Use Ctrl+B for bold, choose Heading from the toolbar.</small>
                        <button type="submit" class="btn btn-success px-5">
                            <i class="bx bx-save me-1"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Live preview --}}
        @if(!empty($orgProfile->management_content))
        <div class="card mt-4 shadow-sm">
            <div class="card-header bg-light">
                <strong><i class="bx bx-show me-1"></i> Currently Saved — Preview</strong>
            </div>
            <div class="card-body" style="font-size:.97rem; line-height:1.9; color:#333; text-align:justify;">
                {!! $orgProfile->management_content !!}
            </div>
        </div>
        @endif
    </div>
</div>

{{-- CKEditor 5 Classic --}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
ClassicEditor
    .create(document.querySelector('#editor-container'), {
        toolbar: {
            items: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'outdent', 'indent', '|',
                'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph',  title: 'Paragraph',  class: 'ck-heading_paragraph' },
                { model: 'heading2',   view: 'h2',  title: 'Heading 2',  class: 'ck-heading_heading2' },
                { model: 'heading3',   view: 'h3',  title: 'Heading 3',  class: 'ck-heading_heading3' },
                { model: 'heading4',   view: 'h4',  title: 'Heading 4',  class: 'ck-heading_heading4' },
            ]
        },
        language: 'en',
    })
    .then(function(editor) {
        // Before form submit, copy editor HTML → hidden textarea
        document.getElementById('mgmt-form').addEventListener('submit', function() {
            document.getElementById('management_content').value = editor.getData();
        });
    })
    .catch(function(error) {
        console.error('CKEditor error:', error);
    });
</script>
<script>
// Client-side file size validation (50MB max)
document.querySelector('form#mgmt-form').addEventListener('submit', function(e){
    var fileInput = document.querySelector('input[name="organogram_pdf"]');
    if (fileInput && fileInput.files && fileInput.files[0]) {
        var maxBytes = 50 * 1024 * 1024; // 50MB
        if (fileInput.files[0].size > maxBytes) {
            e.preventDefault();
            alert('Organogram PDF must be 50MB or smaller. Please choose a smaller file.');
            return false;
        }
    }
});
</script>
@endsection
