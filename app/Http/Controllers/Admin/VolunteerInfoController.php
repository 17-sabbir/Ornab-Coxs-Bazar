<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VolunteerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerInfoController extends Controller
{
    public function index()
    {
        $info = VolunteerInfo::query()->first();
        $applications = DB::table('volunteer_applications')->orderBy('created_at', 'desc')->get();

        return view('admin.volunteer_info.index', compact('info', 'applications'));
    }

    public function edit(string $id)
    {
        $info = VolunteerInfo::findOrFail($id);
        $applications = DB::table('volunteer_applications')->orderBy('created_at', 'desc')->get();

        return view('admin.volunteer_info.edit', compact('info', 'applications'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'what_you_can_do' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'benefits' => 'nullable|string',
        ]);

        $info = VolunteerInfo::findOrFail($id);
        $info->update($validated);

        return redirect()->route('admin.volunteer_info.index')->with('success', 'Volunteer info updated successfully.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'what_you_can_do' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'benefits' => 'nullable|string',
        ]);

        VolunteerInfo::create($validated);

        return redirect()->route('admin.volunteer_info.index')->with('success', 'Volunteer info created successfully.');
    }

    public function updateApplicationStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted',
        ]);

        DB::table('volunteer_applications')->where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
}
