@extends('main')

@section('content')

    @php
        $defaultMission = 'To strengthen communities\' capacity, address poverty\'s root causes, and ensure dignity, safety, and equal rights for all through justice and equal opportunities.';
        $defaultVision  = 'Establish poverty free society where community people enjoy their lives with dignity, safety, and equal rights.';
        $mission = (!empty($mission_vision) && !empty(trim($mission_vision->mission ?? '')))
            ? $mission_vision->mission
            : $defaultMission;
        $vision = (!empty($mission_vision) && !empty(trim($mission_vision->vision ?? '')))
            ? $mission_vision->vision
            : $defaultVision;

        $coreValues = [];
        if (!empty($mission_vision) && !empty(trim($mission_vision->core_values ?? ''))) {
            foreach (explode("\n", $mission_vision->core_values) as $line) {
                if (! trim($line)) continue;
                $parts = array_map('trim', explode('|', $line, 2));
                $name = $parts[0] ?? '';
                $desc = $parts[1] ?? '';
                if ($name !== '') {
                    $coreValues[$name] = $desc;
                }
            }
        }
        if (empty($coreValues)) {
            $coreValues = [
                'Integrity' => 'We uphold honesty, ethical conduct, and strong moral principles in all our actions and decisions.',
                'Equality' => 'We uphold the right of women and adolescent girls to enjoy equal opportunities, dignity, and respect.',
                'Transparency & Accountability' => 'We are accountable to our community, development partners, and to each other, ensuring openness in all our actions.',
                'Inclusiveness' => 'We embrace diversity and ensure equal participation, providing opportunities for all, regardless of background or identity.',
                'Empowerment' => 'We strive to build the confidence, skills, and leadership capacity of women and girls to shape their own futures.',
                'Sustainability' => 'We focus on creating long-term solutions that ensure the lasting success of communities and individuals.',
            ];
        }
    @endphp

    <!-- ======= Mission & Vision Sections ======= -->
    <section class="py-5" style="background: #f4f7f5;">
        <div class="container">

            <div class="row align-items-center g-5 mb-3">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: #0d9488; color: #fff; flex: 0 0 auto;">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h2 class="fw-bold mb-0" style="color: #10372f;">Our Mission</h2>
                    </div>
                    <div class="text-secondary" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                        {{ $mission }}
                    </div>
                </div>
                <div class="col-lg-5">
                    @if(!empty($about->mission_image))
                        <img src="{{ asset('images/about_us/'.$about->mission_image) }}" alt="Our Mission" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                    @else
                        <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #eafaf5, #d3f0e8); min-height: 380px;">
                            <i class="fa-solid fa-bullseye" style="font-size: 5rem; color: #0d9488; opacity: .35;"></i>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row align-items-center g-5 mb-3 flex-lg-row-reverse">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 44px; height: 44px; background: #0d9488; color: #fff; flex: 0 0 auto;">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h2 class="fw-bold mb-0" style="color: #10372f;">Our Vision</h2>
                    </div>
                    <div class="text-secondary" style="line-height: 1.95; font-size: 1.02rem; text-align: justify;">
                        {{ $vision }}
                    </div>
                </div>
                <div class="col-lg-5">
                    @if(!empty($about->vision_image))
                        <img src="{{ asset('images/about_us/'.$about->vision_image) }}" alt="Our Vision" class="img-fluid rounded-4 shadow-sm w-100" style="object-fit: cover; max-height: 380px;">
                    @else
                        <div class="w-100 rounded-4 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #eafaf5, #d3f0e8); min-height: 380px;">
                            <i class="fa-solid fa-eye" style="font-size: 5rem; color: #0d9488; opacity: .35;"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Mission & Vision Sections -->

    <!-- ======= Core Values (below Mission & Vision) ======= -->
    <section style="background: #f4f7f5; padding: 70px 0 90px;">
        <div class="container">
            <div class="text-center mb-5">
                {{-- <span class="mv-eyebrow">What We Stand For</span> --}}
                <h2 class="mv-section-title">Core Values</h2>
            </div>
        @php
            $iconMap = [
                'Integrity' => 'fa-shield-halved',
                'Equality' => 'fa-scale-balanced',
                'Transparency & Accountability' => 'fa-eye',
                'Inclusiveness' => 'fa-users',
                'Empowerment' => 'fa-hand-holding-heart',
                'Sustainability' => 'fa-seedling',
                'Excellence' => 'fa-trophy',
                'Innovation' => 'fa-lightbulb',
                'Collaboration' => 'fa-people-group',
                'Respect' => 'fa-heart',
                'Accountability' => 'fa-clipboard-check',
                'Diversity' => 'fa-globe',
            ];
            $fallbackIcons = ['fa-star', 'fa-certificate', 'fa-medal', 'fa-award', 'fa-flag', 'fa-thumbs-up'];
            $fallbackIndex = 0;
        @endphp

        <div class="row g-4">
            @foreach ($coreValues as $name => $desc)
                @php
                    $icon = $iconMap[$name] ?? $fallbackIcons[$fallbackIndex % count($fallbackIcons)];
                    if (!isset($iconMap[$name])) $fallbackIndex++;
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="d-flex gap-3">
                        <div class="mv-value-icon flex-shrink-0">
                            <i class="fa-solid {{ $icon }}"></i>
                        </div>
                        <div>
                            <h5 class="mv-value-title">{{ $name }}</h5>
                            <p class="mv-value-text">{{ $desc }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </section>


    <style>
        .mv-eyebrow { display: inline-block; padding: .35rem 1rem; border-radius: 50px; background: rgba(255,255,255,.15); color: #e6fffb; font-weight: 700; font-size: .8rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 1rem; }
        .mv-section-title { font-weight: 800; color: #10372f; }
        .mv-value-icon { width: 44px; height: 44px; flex: 0 0 auto; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: rgba(13,148,136,.1); color: #0d9488; font-size: 1.1rem; }
        .mv-value-title { font-weight: 700; color: #10372f; margin: 0 0 .4rem; font-size: 1.02rem; }
        .mv-value-text { color: #5b6b66; font-size: .92rem; line-height: 1.6; margin: 0; }
    </style>

@endsection