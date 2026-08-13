<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AuditReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AuditReport::query();
        
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%')
                  ->orWhere('year', 'like', '%'.$request->search.'%');
        }
        
        $reports = $query->ordered()->paginate(20);
        
        return view('admin.audit.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.audit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:10',
            'audit_firm' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'pdf_file' => 'required|file|mimes:pdf|max:5120', // 5MB
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('pdf_file')) {
            $path = $request->file('pdf_file')->store('audit_reports', 'public');
            $validated['pdf_file'] = $path;
        }

        AuditReport::create($validated);

        return redirect()->route('admin.audit_reports.index')
                        ->with('success', 'Audit report created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AuditReport $auditReport)
    {
        return view('admin.audit.edit', compact('auditReport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AuditReport $auditReport)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'year' => 'required|string|max:10',
            'audit_firm' => 'nullable|string|max:255',
            'summary' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:5120', // 5MB
            'status' => 'required|in:active,inactive',
            'order' => 'required|integer|min:0',
        ]);

        if ($request->hasFile('pdf_file')) {
            // Delete old file
            if ($auditReport->pdf_file && Storage::disk('public')->exists($auditReport->pdf_file)) {
                Storage::disk('public')->delete($auditReport->pdf_file);
            }
            $path = $request->file('pdf_file')->store('audit_reports', 'public');
            $validated['pdf_file'] = $path;
        }

        $auditReport->update($validated);

        return redirect()->route('admin.audit_reports.index')
                        ->with('success', 'Audit report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AuditReport $auditReport)
    {
        // Delete PDF file
        if ($auditReport->pdf_file && Storage::disk('public')->exists($auditReport->pdf_file)) {
            Storage::disk('public')->delete($auditReport->pdf_file);
        }

        /** @intelephense-ignore P1005 */
        $auditReport->delete();

        return redirect()->route('admin.audit_reports.index')
                        ->with('success', 'Audit report deleted successfully.');
    }
}