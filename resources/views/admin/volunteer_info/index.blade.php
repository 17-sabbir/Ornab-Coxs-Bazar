@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Volunteer Information</h6>
        <hr/>

        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form action="{{ isset($info) && $info ? route('admin.volunteer_info.update', $info->id) : route('admin.volunteer_info.store') }}" method="post">
                        @csrf
                        @if(isset($info) && $info)
                            @method('PUT')
                        @endif

                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="what_you_can_do" class="form-label">What You Can Do <span class="text-danger">*</span></label>
                                <textarea id="what_you_can_do" name="what_you_can_do" class="form-control @error('what_you_can_do') is-invalid @enderror" rows="4" required>{{ old('what_you_can_do', $info->what_you_can_do ?? '') }}</textarea>
                                @error('what_you_can_do')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="eligibility" class="form-label">Eligibility & Commitment <span class="text-danger">*</span></label>
                                <textarea id="eligibility" name="eligibility" class="form-control @error('eligibility') is-invalid @enderror" rows="4" required>{{ old('eligibility', $info->eligibility ?? '') }}</textarea>
                                @error('eligibility')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-12">
                                <label for="benefits" class="form-label">Benefits <span class="text-danger">*</span></label>
                                <textarea id="benefits" name="benefits" class="form-control @error('benefits') is-invalid @enderror" rows="4" required>{{ old('benefits', $info->benefits ?? '') }}</textarea>
                                @error('benefits')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 mt-2">
                                <button class="btn btn-primary px-5" type="submit">
                                    <i class='bx bx-save me-1'></i> {{ isset($info) && $info ? 'Update' : 'Save' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Application List --}}
        <div class="card mt-4">
            <div class="card-header bg-transparent border-0 pt-3 pb-0">
                <h6 class="fw-bold text-uppercase text-muted mb-0">Application List</h6>
            </div>
            <div class="card-body">
                @if(isset($applications) && count($applications) > 0)
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Interest</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $app)
                                <tr>
                                    <td class="fw-semibold">{{ $app->name }}</td>
                                    <td>{{ $app->email }}</td>
                                    <td>{{ $app->phone }}</td>
                                    <td>{{ $app->interest ?? '—' }}</td>
                                    <td>{{ $app->location ?? '—' }}</td>
                                    <td>
                                        <span class="badge {{ $app->status == 'pending' ? 'bg-warning text-dark' : ($app->status == 'contacted' ? 'bg-info text-dark' : 'bg-secondary') }}">
                                            {{ ucfirst($app->status) }}
                                        </span>
                                    </td>
                                    <td class="text-muted small">{{ \Carbon\Carbon::parse($app->created_at)->format('d M Y') }}</td>
                                    <td>
                                        <form action="{{ route('admin.volunteer_applications.update_status', $app->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('POST')
                                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto;">
                                                <option value="pending" {{ $app->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="contacted" {{ $app->status == 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <p class="text-muted mb-0">No applications received yet.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
