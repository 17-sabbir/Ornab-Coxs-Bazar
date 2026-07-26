<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardOfDirector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BoardOfDirectorController extends Controller
{
    public function index()
    {
        $directors = BoardOfDirector::orderBy('order', 'asc')->orderBy('id', 'asc')->get();
        return view('admin.board_of_directors.index', compact('directors'));
    }

    public function create()
    { 
        return view('admin.board_of_directors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $validated['image'] = optimizeImageUpload($file, 'images/board_of_directors', $filename);
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $request->order ?? 0;

        BoardOfDirector::create($validated);

        return redirect()->route('admin.board_of_directors.index')
            ->with('success', 'Board member added successfully.');
    }

    public function edit(BoardOfDirector $boardOfDirector)
    {
        return view('admin.board_of_directors.edit', compact('boardOfDirector'));
    }

    public function update(Request $request, BoardOfDirector $boardOfDirector)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($boardOfDirector->image) {
                $oldPath = public_path('images/board_of_directors/' . $boardOfDirector->image);
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $validated['image'] = optimizeImageUpload($file, 'images/board_of_directors', $filename);
        }

        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['order'] = $request->order ?? 0;

        $boardOfDirector->update($validated);

        return redirect()->route('admin.board_of_directors.index')
            ->with('success', 'Board member updated successfully.');
    }

    public function destroy(BoardOfDirector $boardOfDirector)
    {
        if ($boardOfDirector->image) {
            $path = public_path('images/board_of_directors/' . $boardOfDirector->image);
            if (file_exists($path)) {
                @unlink($path);
            }
        }
        $boardOfDirector->delete();

        return redirect()->route('admin.board_of_directors.index')
            ->with('success', 'Board member deleted successfully.');
    }
}