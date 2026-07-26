<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\YoutubeVideo;

class YoutubeVideoController extends Controller
{
    public function index()
    {
        $videos = YoutubeVideo::orderBy('order', 'asc')->get();
        return view('admin.youtube.index', compact('videos'));
    }

    public function add()
    {
        return view('admin.youtube.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'youtube_link' => 'required|string',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        YoutubeVideo::create([
            'title' => $request->title,
            'youtube_link' => $request->youtube_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 1,
        ]);

        return redirect()->back()->with('success', 'YouTube video added');
    }

    public function edit($id)
    {
        $video = YoutubeVideo::findOrFail($id);
        return view('admin.youtube.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = YoutubeVideo::findOrFail($id);

        $validated = $request->validate([
            'youtube_link' => 'required|string',
            'title' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
        ]);

        $video->update([
            'title' => $request->title,
            'youtube_link' => $request->youtube_link,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'YouTube video updated');
    }

    public function destroy($id)
    {
        YoutubeVideo::where('id', $id)->delete();
        return redirect()->back()->with('success', 'YouTube video deleted');
    }
}
