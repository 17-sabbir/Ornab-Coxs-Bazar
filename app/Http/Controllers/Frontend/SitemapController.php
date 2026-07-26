<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            ['url' => url('/'), 'priority' => '1.0', 'freq' => 'daily'],
            ['url' => route('about.us'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('vision.mission'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('ongoing.project'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('project.archieve'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('latest.news.all'), 'priority' => '0.8', 'freq' => 'daily'],
            ['url' => route('gallery.albums'), 'priority' => '0.7', 'freq' => 'weekly'],
            ['url' => route('donate'), 'priority' => '0.9', 'freq' => 'weekly'],
            ['url' => route('contact'), 'priority' => '0.8', 'freq' => 'weekly'],
            ['url' => route('volunterr.opportunities'), 'priority' => '0.7', 'freq' => 'weekly'],
            ['url' => route('annual.reports'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('financial.statements'), 'priority' => '0.7', 'freq' => 'monthly'],
            ['url' => route('audit.reports'), 'priority' => '0.7', 'freq' => 'monthly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($urls as $item) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . $item['url'] . '</loc>' . PHP_EOL;
            $xml .= '    <changefreq>' . $item['freq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $item['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }

        $xml .= '</urlset>' . PHP_EOL;

        return new Response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}