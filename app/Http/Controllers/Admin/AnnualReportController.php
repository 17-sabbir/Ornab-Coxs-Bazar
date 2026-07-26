<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnnualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnualReportController extends Controller
{
    public function index()
    {
        $reports = AnnualReport::orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        return view('admin.reports.index', compact('reports'));
    }

    public function create()
    {
        return view('admin.reports.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|digits:4',
            'description' => 'nullable',
            'file' => 'nullable|mimes:pdf,doc,docx|max:20480',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = [
            'title' => $validated['title'],
            'year' => $validated['year'],
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ];

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('annual_reports', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('annual_reports/covers', 'public');
        }

        AnnualReport::create($data);

        return redirect()->route('admin.annual_reports.index')->with('success', 'Annual Report created successfully.');
    }

    public function edit(AnnualReport $annualReport)
    {
        return view('admin.reports.edit', compact('annualReport'));
    }

    public function update(Request $request, AnnualReport $annualReport)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'year' => 'required|digits:4',
            'description' => 'nullable',
            'file' => 'nullable|mimes:pdf,doc,docx|max:20480',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = [
            'title' => $validated['title'],
            'year' => $validated['year'],
            'description' => $validated['description'] ?? null,
            'is_active' => $request->boolean('is_active', true),
            'order' => $validated['order'] ?? 0,
        ];

        if ($request->hasFile('file')) {
            if ($annualReport->file_path) {
                Storage::disk('public')->delete($annualReport->file_path);
            }
            $data['file_path'] = $request->file('file')->store('annual_reports', 'public');
        }

        if ($request->hasFile('cover_image')) {
            if ($annualReport->cover_image) {
                Storage::disk('public')->delete($annualReport->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('annual_reports/covers', 'public');
        }

        $annualReport->update($data);

        return redirect()->route('admin.annual_reports.index')->with('success', 'Annual Report updated successfully.');
    }

    public function destroy(AnnualReport $annualReport)
    {
        if ($annualReport->file_path) {
            Storage::disk('public')->delete($annualReport->file_path);
        }
        if ($annualReport->cover_image) {
            Storage::disk('public')->delete($annualReport->cover_image);
        }
        $annualReport->delete();

        return redirect()->route('admin.annual_reports.index')->with('success', 'Annual Report deleted successfully.');
    }
}