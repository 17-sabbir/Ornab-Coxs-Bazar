<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use App\Models\Project;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            ['url' => url('/'), 'priority' => '1.0', 'freq' => 'daily'],
            ['url' => route('about.us'), 'priority' => '0.8', 'freq' => 'monthly'],
            ['url' => route('vision.mission'), 'priority' => '0.6', 'freq' => 'monthly'],
            ['url' => route('team.members'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('origin_affilation'), 'priority' => '0.5', 'freq' => 'yearly'],
            ['url' => route('board.of.directors'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('partner.donor'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('frontend.projects'), 'priority' => '0.9', 'freq' => 'weekly'],
            ['url' => route('ongoing.project'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('project.archieve'), 'priority' => '0.6', 'freq' => 'monthly'],
            ['url' => route('focus.areas'), 'priority' => '0.8', 'freq' => 'monthly'],
            ['url' => route('latest.news.all'), 'priority' => '0.8', 'freq' => 'daily'],
            ['url' => route('notices.all'), 'priority' => '0.6', 'freq' => 'weekly'],
            ['url' => route('youtube.video'), 'priority' => '0.5', 'freq' => 'weekly'],
            ['url' => route('gallery.albums'), 'priority' => '0.6', 'freq' => 'weekly'],
            ['url' => route('photo.all'), 'priority' => '0.5', 'freq' => 'weekly'],
            ['url' => route('strategic.plan'), 'priority' => '0.5', 'freq' => 'yearly'],
            ['url' => route('policy.guideline'), 'priority' => '0.5', 'freq' => 'yearly'],
            ['url' => route('publication'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('invoked.career'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('volunteer.index'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('donate'), 'priority' => '0.9', 'freq' => 'weekly'],
            ['url' => route('contact'), 'priority' => '0.8', 'freq' => 'monthly'],
            ['url' => route('faq'), 'priority' => '0.5', 'freq' => 'monthly'],
            ['url' => route('annual.reports'), 'priority' => '0.6', 'freq' => 'monthly'],
            ['url' => route('financial.statements'), 'priority' => '0.6', 'freq' => 'monthly'],
        ];

        // Dynamic pages: projects
        foreach (Project::query()->orderBy('id', 'desc')->get() as $project) {
            $urls[] = [
                'url' => route('ongoing.project.view', $project->id),
                'priority' => '0.6',
                'freq' => 'monthly',
            ];
        }

        // Dynamic pages: focus areas
        foreach (FocusArea::active()->ordered()->get() as $focusArea) {
            $urls[] = [
                'url' => route('focus.area.detail', $focusArea->id),
                'priority' => '0.6',
                'freq' => 'monthly',
            ];
        }

        // Dynamic pages: latest news
        foreach (DB::table('latest_news')->orderBy('news_date', 'desc')->get() as $news) {
            $urls[] = [
                'url' => route('latest.news.view', $news->id),
                'priority' => '0.5',
                'freq' => 'monthly',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $item) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($item['url'], ENT_XML1) . '</loc>' . PHP_EOL;
            $xml .= '    <changefreq>' . $item['freq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $item['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        return new Response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
