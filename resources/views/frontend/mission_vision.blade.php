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
        $bg = (!empty($mission_vision) && !empty($mission_vision->background_image))
            ? asset('images/mission_vision/'.$mission_vision->background_image)
            : null;

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

    <!-- ======= Mission & Vision Hero ======= -->
    <section class="mv-hero @if($bg) mv-hero--img @endif" @if($bg) style="background-image: linear-gradient(rgba(16,55,47,.82), rgba(13,95,73,.82)), url('{{ $bg }}');" @endif>
        <div class="container text-center">
            <h1 class="mv-title">Mission &amp; Vision</h1>
            <p class="mv-lead">The principles that guide every decision we make and shape the future we build together.</p>
        </div>
    </section>

    <!-- ======= Mission & Vision Cards ======= -->
    <section class="mv-body">
        <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-5" data-aos="fade-up">
                <div class="mv-card h-100 text-center">
                    <div class="mv-icon mx-auto"><i class="fa-solid fa-bullseye"></i></div>
                    <h3 class="mv-card-title">Our Mission</h3>
                    <p class="mv-card-text">{{ $mission }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5" data-aos="fade-up" data-aos-delay="100">
                <div class="mv-card h-100 text-center">
                    <div class="mv-icon mx-auto"><i class="fa-solid fa-eye"></i></div>
                    <h3 class="mv-card-title">Our Vision</h3>
                    <p class="mv-card-text">{{ $vision }}</p>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!-- ======= Core Values (below Mission & Vision) ======= -->
    <section class="mv-values">
        <div class="container" data-aos="fade-up">
            <div class="text-center mb-5">
                <span class="mv-eyebrow">What We Stand For</span>
                <h2 class="mv-section-title">Core Values</h2>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($coreValues as $name => $desc)
                <div class="col-sm-6 col-lg-4" data-aos="zoom-in">
                    <div class="mv-value-card h-100">
                        <div class="mv-value-icon"><i class="fa-solid fa-gem"></i></div>
                        <h5 class="mv-value-title">{{ $name }}</h5>
                        <p class="mv-value-text">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <style>
        .mv-hero { background: linear-gradient(135deg, #0d5f49, #10372f); padding: 80px 0 60px; text-align: center; color: #fff; }
        .mv-hero--img { background-size: cover; background-position: center; }
        .mv-eyebrow { display: inline-block; padding: .35rem 1rem; border-radius: 50px; background: rgba(255,255,255,.15); color: #e6fffb; font-weight: 700; font-size: .8rem; letter-spacing: 1px; text-transform: uppercase; margin-bottom: 1rem; }
        .mv-title { font-weight: 800; margin-bottom: .8rem; color: #fff; }
        .mv-lead { color: rgba(255,255,255,.85); max-width: 640px; margin: 0 auto; font-size: 1.05rem; }
        .mv-body { background: #fff; padding: 70px 0 40px; }
        .mv-card { border: 1px solid #eef1f0; border-top: 4px solid #0d9488; border-radius: 16px; background: #fff; padding: 2.4rem 1.8rem; height: 100%; box-shadow: 0 6px 20px rgba(16,55,47,.05); transition: transform .3s ease, box-shadow .3s ease; }
        .mv-card:hover { transform: translateY(-8px); box-shadow: 0 20px 45px rgba(13,148,136,.16); }
        .mv-icon { width: 70px; height: 70px; border-radius: 16px; display: flex; align-items: center; justify-content: center; font-size: 1.7rem; color: #0d9488; background: rgba(13,148,136,.1); margin-bottom: 1.3rem; transition: transform .3s ease, background .3s ease, color .3s ease; }
        .mv-card:hover .mv-icon { transform: scale(1.12) rotate(-5deg); background: #0d9488; color: #fff; }
        .mv-card-title { font-weight: 700; color: #10372f; margin-bottom: .8rem; }
        .mv-card-text { color: #4a5a55; line-height: 1.9; font-size: 1.02rem; }
        .mv-values { background: #f6fbfa; padding: 70px 0 90px; }
        .mv-section-title { font-weight: 800; color: #10372f; }
        .mv-value-card { display: flex; align-items: flex-start; gap: 1rem; background: #fff; border: 1px solid #eef1f0; border-left: 4px solid #0d9488; border-radius: 14px; padding: 1.4rem 1.5rem; box-shadow: 0 6px 20px rgba(16,55,47,.05); transition: transform .3s ease, box-shadow .3s ease; }
        .mv-value-card:hover { transform: translateY(-6px); box-shadow: 0 18px 40px rgba(13,148,136,.14); }
        .mv-value-icon { width: 46px; height: 46px; flex: 0 0 auto; border-radius: 12px; display: flex; align-items: center; justify-content: center; background: rgba(13,148,136,.1); color: #0d9488; font-size: 1.2rem; }
        .mv-value-title { font-weight: 700; color: #10372f; margin: 0 0 .4rem; font-size: 1.02rem; }
        .mv-value-text { color: #5b6b66; font-size: .92rem; line-height: 1.6; margin: 0; }
    </style>

@endsection