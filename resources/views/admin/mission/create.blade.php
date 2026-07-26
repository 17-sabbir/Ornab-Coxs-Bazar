@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Add Mission & Vision</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                <div class="p-4 border rounded">
                    <form class="row g-3" action="{{ isset($mission) ? route('mission.vision.update') : route('mission.vision.store') }}" method="post" enctype="multipart/form-data" id="missionForm">
                        @csrf

                        {{-- Background Image --}}
                        <div class="col-md-12">
                            <label for="background_image" class="form-label">Background Image (Home Mission/Vision)</label>
                            <input type="file" name="background_image" class="form-control @error('background_image') is-invalid @enderror" id="background_image">
                            <span class="text-info small">Optional. Recommended size: 1920x600.</span>
                            @error('background_image')<div class="text-danger">{{ $message }}</div>@enderror
                            @if(!empty($mission->background_image))
                                <div class="mt-2">
                                    <div class="fw-bold small mb-1">Current Background:</div>
                                    <img src="{{ asset('images/mission_vision/'.$mission->background_image) }}" alt="Background" style="max-width:100%;height:120px;object-fit:cover;border-radius:6px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="remove_background_image" name="remove_background_image">
                                        <label class="form-check-label" for="remove_background_image">Remove current background image</label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Vision --}}
                        <div class="col-md-12">
                            <label for="vision" class="form-label">Vision</label>
                            <textarea id="vision" name="vision" class="form-control @error('vision') is-invalid @enderror" rows="3">{{ old('vision', $mission->vision ?? '') }}</textarea>
                            @error('vision')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- Mission --}}
                        <div class="col-md-12">
                            <label for="mission" class="form-label">Mission</label>
                            <textarea id="mission" name="mission" class="form-control @error('mission') is-invalid @enderror" rows="3">{{ old('mission', $mission->mission ?? '') }}</textarea>
                            @error('mission')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        {{-- Core Values --}}
                        <div class="col-md-12">
                            <label for="core_values" class="form-label">Core Values</label>
                            <textarea id="core_values" name="core_values" class="form-control @error('core_values') is-invalid @enderror" rows="6" placeholder="Integrity | We uphold honesty, ethical conduct...">{{ old('core_values', $mission->core_values ?? '') }}</textarea>
                            <span class="text-info small">One value per line. Format: <code>Name | Description</code>. Leave empty to use the default profile values.</span>
                            @error('core_values')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>

                        <div class="col-12 mt-2">
                            <button class="btn btn-primary px-5" type="submit">
                                <i class='bx bx-save me-1'></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ===== CURRENT DATA PREVIEW ===== --}}
        <div class="card border-top border-0 border-4 border-info mt-4">
            <div class="card-header bg-transparent border-0 pt-3 pb-0">
                <h6 class="fw-bold text-uppercase text-muted mb-0">Current Saved Data</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <h6 class="fw-semibold text-success">Vision:</h6>
                        <p>{{ $mission->vision ?? '—' }}</p>
                    </div>
                    <div class="col-md-12">
                        <h6 class="fw-semibold text-success">Mission:</h6>
                        <p>{{ $mission->mission ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
