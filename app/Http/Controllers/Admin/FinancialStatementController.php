<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinancialStatement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinancialStatementController extends Controller
{
    public function index()
    {
        $statements = FinancialStatement::orderBy('year', 'desc')->orderBy('order', 'asc')->get();
        return view('admin.financial.index', compact('statements'));
    }

    public function create()
    {
        return view('admin.financial.create');
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
            $data['file_path'] = $request->file('file')->store('financial_statements', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('financial_statements/covers', 'public');
        }

        FinancialStatement::create($data);

        return redirect()->route('admin.financial_statements.index')->with('success', 'Financial Statement created successfully.');
    }

    public function edit(FinancialStatement $financialStatement)
    {
        return view('admin.financial.edit', compact('financialStatement'));
    }

    public function update(Request $request, FinancialStatement $financialStatement)
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
            if ($financialStatement->file_path) {
                Storage::disk('public')->delete($financialStatement->file_path);
            }
            $data['file_path'] = $request->file('file')->store('financial_statements', 'public');
        }

        if ($request->hasFile('cover_image')) {
            if ($financialStatement->cover_image) {
                Storage::disk('public')->delete($financialStatement->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('financial_statements/covers', 'public');
        }

        $financialStatement->update($data);

        return redirect()->route('admin.financial_statements.index')->with('success', 'Financial Statement updated successfully.');
    }

    public function destroy(FinancialStatement $financialStatement)
    {
        if ($financialStatement->file_path) {
            Storage::disk('public')->delete($financialStatement->file_path);
        }
        if ($financialStatement->cover_image) {
            Storage::disk('public')->delete($financialStatement->cover_image);
        }
        $financialStatement->delete();

        return redirect()->route('admin.financial_statements.index')->with('success', 'Financial Statement deleted successfully.');
    }
}