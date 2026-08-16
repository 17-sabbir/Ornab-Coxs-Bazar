<?php

use App\Http\Controllers\frontController;
use App\Http\Controllers\Frontend\PageController;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Clints Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $slider = DB::table('slider')->where('is_active', true)->orderBy('order', 'asc')->get();
    $project = Project::where('status', 'ongoing')
        ->orderBy('priority', 'asc')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();
    $news = DB::table('latest_news')->orderBy('news_date', 'desc')->orderBy('id', 'desc')->take(6)->get();
    $partners = DB::table('partners')->orderBy('id', 'desc')->get();
    $mission_vision = DB::table('mission_vision')->orderBy('id', 'asc')->first();
    $albumAgg = DB::table('gallery')
        ->select('album', DB::raw('MAX(id) as cover_id'), DB::raw('COUNT(*) as photo_count'))
        ->groupBy('album')
        ->orderBy('cover_id', 'desc')
        ->get();

    $coverRows = DB::table('gallery')
        ->whereIn('id', $albumAgg->pluck('cover_id'))
        ->get()
        ->keyBy('id');

    $albums = $albumAgg->map(function ($row) use ($coverRows) {
        $name = $row->album ?: 'General';
        $cover = $coverRows->get($row->cover_id);

        return (object) [
            'name' => $name,
            'cover_image' => $cover ? $cover->image : null,
            'photo_count' => (int) $row->photo_count,
        ];
    })->values();

    $albumsPreview = $albums->take(6);
    $hasMoreAlbums = $albums->count() > 6;
    $application = DB::table('applications')->get()->first();

    $projectsCount = DB::table('projects')->count();

    $rawLocations = DB::table('projects')->whereNotNull('locations')->pluck('locations')->toArray();
    $upazilas = [];
    foreach ($rawLocations as $loc) {
        $normalized = preg_replace('/\s+of\s+|\s+in\s+/i', ',', $loc);
        $parts = array_filter(array_map('trim', explode(',', $normalized)));
        foreach ($parts as $p) {
            if ($p === '') {
                continue;
            }

            if (preg_match('/\bDistrict\b/i', $p)) {
                continue;
            }

            if (preg_match('/^(.*?)\s*Upazila\b/i', $p, $m)) {
                $name = trim($m[1]);
            } else {
                $name = trim($p);
            }

            if ($name !== '') {
                $upazilas[strtolower($name)] = $name;
            }
        }
    }
    $districtsCount = count($upazilas);

    $statistics = application();

    $focusAreas = \App\Models\FocusArea::active()->ordered()->get();

    return view('home', compact('slider', 'project', 'news', 'partners', 'mission_vision', 'albumsPreview', 'hasMoreAlbums', 'application', 'projectsCount', 'districtsCount', 'statistics', 'focusAreas'));
});

Route::post('user/subscribe', [frontController::class, 'subscribe'])->name('user.subscribe')->middleware('recaptcha');

// About us
Route::get('about/us', [frontController::class, 'about_us'])->name('about.us');
Route::get('mission/vision', [frontController::class, 'vision_mission'])->name('vision.mission');
Route::get('about/us/team/members', [frontController::class, 'teamMembers'])->name('team.members');
Route::get('origin/affilation', [frontController::class, 'origin_affilation'])->name('origin_affilation');
Route::get('board-of-directors', [frontController::class, 'boardOfDirectors'])->name('board.of.directors');
Route::get('partner/donor', [frontController::class, 'partner'])->name('partner.donor');
// Route 'about/impact' removed — Impact page no longer required.

// Programs
Route::get('project/archieve', [frontController::class, 'proj_archieve'])->name('project.archieve');
Route::get('ongoing/project', [frontController::class, 'ongoing_project'])->name('ongoing.project');
Route::get('ongoing/project/view/{id}', [frontController::class, 'project_view'])->name('ongoing.project.view');
Route::get('latest/news/view/{id}', [frontController::class, 'news_view'])->name('latest.news.view');
Route::get('latest/news/all', [frontController::class, 'news_all'])->name('latest.news.all');
Route::get('notices/all', [frontController::class, 'notice_all'])->name('notices.all');
Route::get('notices/view/{id}', [frontController::class, 'notice_view'])->name('notices.view');
Route::get('youtube/video', [frontController::class, 'youtube'])->name('youtube.video');

// Stay Informed

// Stay Informed
Route::get('strategic/plan', [frontController::class, 'strategic_plan'])->name('strategic.plan');
Route::get('policy/guideline', [frontController::class, 'policy_guideline'])->name('policy.guideline');
Route::get('policy/download/{id}', [frontController::class, 'downloadPolicy'])->name('policy.download');
Route::get('publication', [frontController::class, 'publication'])->name('publication');

// Involved
Route::get('get_invoked/career', [frontController::class, 'career'])->name('invoked.career');
Route::get('get_invoked/volunteer', [frontController::class, 'volOpportunities'])->name('volunteer.index');
Route::post('volunteer/apply/submit', [frontController::class, 'volunteerSubmit'])->name('volunteer.submit')->middleware('recaptcha');
Route::get('donate', [frontController::class, 'donate'])->name('donate');
Route::post('donation/submit', [frontController::class, 'donationSubmit'])->name('donation.submit')->middleware('recaptcha');
Route::get('contact', [frontController::class, 'contact'])->name('contact');
Route::post('message/store', [frontController::class, 'messageStore'])->name('message.store')->middleware('recaptcha');

// __Gallery
Route::get('gallery/all', [frontController::class, 'all_photos'])->name('photo.all');
Route::get('gallery/albums', [frontController::class, 'albums'])->name('gallery.albums');
Route::get('gallery/album/{album}', [frontController::class, 'album_photos'])->name('gallery.album');

// FAQ
Route::get('faq', [frontController::class, 'faq'])->name('faq');

// Transparency
Route::get('annual-reports', [frontController::class, 'annualReports'])->name('annual.reports');
Route::get('financial-statements', [frontController::class, 'financialStatements'])->name('financial.statements');

// Projects
Route::get('projects', [PageController::class, 'projects'])->name('frontend.projects');
Route::get('projects/reports/{report}/download', [frontController::class, 'downloadProjectReport'])->name('projects.reports.download');

// Focus Areas
Route::get('focus-areas', [frontController::class, 'focusAreas'])->name('focus.areas');
Route::get('focus-areas/{id}', [frontController::class, 'focusAreaDetail'])->name('focus.area.detail');

// SEO
Route::get('sitemap.xml', [\App\Http\Controllers\Frontend\SitemapController::class, 'index'])->name('sitemap');
Route::get('robots.txt', function () {
    return response()->view('robots', [], 200)
        ->header('Content-Type', 'text/plain');
});
