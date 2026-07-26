<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerApplicationController extends Controller
{
    /**
     * List all volunteer applications.
     */
    public function index(Request $request)
    {
        $query = DB::table('volunteer_applications');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $applications = $query->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.volunteer_applications.index', compact('applications'));
    }

    /**
     * Remove the specified application.
     */
    public function destroy($id)
    {
        DB::table('volunteer_applications')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Volunteer application deleted successfully.');
    }
}
