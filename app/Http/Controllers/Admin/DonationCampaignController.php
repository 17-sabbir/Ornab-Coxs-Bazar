<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationCampaignController extends Controller
{
    public function index()
    {
        $campaigns = DB::table('donation_campaigns')->orderBy('order')->orderBy('id', 'desc')->get();

        return view('admin.donation_campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.donation_campaigns.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purpose' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        DB::table('donation_campaigns')->insert($data + ['created_at' => now(), 'updated_at' => now()]);

        return redirect()->route('admin.donation_campaigns.index')->with('success', 'Campaign created successfully.');
    }

    public function edit($id)
    {
        $campaign = DB::table('donation_campaigns')->find($id);

        return view('admin.donation_campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purpose' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'order' => 'nullable|integer',
        ]);

        DB::table('donation_campaigns')->where('id', $id)->update($data + ['updated_at' => now()]);

        return redirect()->route('admin.donation_campaigns.index')->with('success', 'Campaign updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('donation_campaigns')->where('id', $id)->delete();

        return redirect()->route('admin.donation_campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
}
