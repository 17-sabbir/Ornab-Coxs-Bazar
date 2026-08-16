<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FocusAreaController extends Controller
{
    public function index()
    {
        $focusAreas = FocusArea::orderBy('order', 'desc')->orderBy('id', 'desc')->get();
        return view('admin.focus_areas.index', compact('focusAreas'));
    }

    public function create()
    {
        return view('admin.focus_areas.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($image = $request->file('image')) {
            $imagePath = $image->store('focus_areas', 'public');
        }

        FocusArea::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.focus_areas.index');
    }

    public function edit($id)
    {
        $focusArea = FocusArea::findOrFail($id);
        return view('admin.focus_areas.edit', compact('focusArea'));
    }

    public function update(Request $request, $id)
    {
        $focusArea = FocusArea::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = $focusArea->image_path;
        if ($image = $request->file('image')) {
            if ($focusArea->image_path && Storage::disk('public')->exists($focusArea->image_path)) {
                Storage::disk('public')->delete($focusArea->image_path);
            }
            $imagePath = $image->store('focus_areas', 'public');
        }

        $focusArea->update([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.focus_areas.index')->with('success', 'Focus Area updated successfully');
    }

    public function destroy($id)
    {
        $focusArea = FocusArea::findOrFail($id);

        if ($focusArea->image_path && Storage::disk('public')->exists($focusArea->image_path)) {
            Storage::disk('public')->delete($focusArea->image_path);
        }

        $focusArea->delete();

        return redirect()->back()->with('success', 'Focus Area deleted successfully');
    }
}
