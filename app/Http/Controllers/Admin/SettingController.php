<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        // The public website reads settings from the `applications` table
        // (see the `application()` helper), so we manage that same row here.
        $settings = DB::table('applications')->first();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update the settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string',
            'copyright_text' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'google_map_embed' => 'nullable|string',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'youtube' => 'nullable|url|max:255',
            'statistics_donors' => 'nullable|integer|min:0',
            'statistics_beneficiaries' => 'nullable|integer|min:0',
            'statistics_projects' => 'nullable|integer|min:0',
            'statistics_volunteers' => 'nullable|integer|min:0',
        ]);

        $existing = DB::table('applications')->first();

        if ($existing) {
            DB::table('applications')->where('id', $existing->id)->update($validated);
        } else {
            DB::table('applications')->insert($validated);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    /**
     * Show the Impact Matrix editor.
     */
    public function impact()
    {
        $settings = DB::table('applications')->first();

        return view('admin.impact.index', compact('settings'));
    }

    /**
     * Update the Impact Matrix statistics.
     */
    public function impactUpdate(Request $request)
    {
        $validated = $request->validate([
            'statistics_donors' => 'nullable|integer|min:0',
            'statistics_beneficiaries' => 'nullable|integer|min:0',
            'statistics_projects' => 'nullable|integer|min:0',
            'statistics_volunteers' => 'nullable|integer|min:0',
        ]);

        $existing = DB::table('applications')->first();

        if ($existing) {
            DB::table('applications')->where('id', $existing->id)->update($validated);
        } else {
            DB::table('applications')->insert($validated);
        }

        return redirect()->back()->with('success', 'Impact matrix updated successfully.');
    }
}