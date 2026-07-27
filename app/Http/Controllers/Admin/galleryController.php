<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class galleryController extends Controller
{
    // add
    public function add()
    {
        return view('admin.gallery.add');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'album' => 'required',
            'title' => 'nullable',
            'description' => 'nullable',
            'image' => 'required_without:images|nullable|mimes:jpg,jpeg,png,gif,webp',
            'images' => 'required_without:image|nullable|array',
            'images.*' => 'mimes:jpg,jpeg,png,gif,webp',
        ]);

        $files = $request->file('images', []);
        if (empty($files) && $request->file('image')) {
            $files = [$request->file('image')];
        }

        $rows = [];
        $fileCount = count($files);

        foreach ($files as $index => $file) {
            $imageName = uniqid('', true).'_gallery.'.$file->getClientOriginalExtension();
            optimizeImageUpload($file, 'images/gallery/', $imageName);

            $derivedTitle = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $derivedTitle = trim(str_replace(['_', '-'], ' ', $derivedTitle));

            $title = trim((string) $request->title);
            if ($title === '') {
                $title = $derivedTitle !== '' ? $derivedTitle : 'Photo';
            } elseif ($fileCount > 1) {
                $title = $title.' ('.($index + 1).')';
            }

            $rows[] = [
                'album' => $request->album,
                'title' => $title,
                'description' => $request->description,
                'image' => $imageName,
            ];
        }

        DB::table('gallery')->insert($rows);

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $gallery = DB::table('gallery')
            ->orderBy('album', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.gallery.index', compact('gallery'));
    }

    // Return unique album names as JSON (for AJAX dropdown)
    public function albums()
    {
        $albums = DB::table('gallery')
            ->select('album')
            ->whereNotNull('album')
            ->where('album', '!=', '')
            ->distinct()
            ->orderBy('album', 'asc')
            ->pluck('album');

        return response()->json($albums);
    }

    // Destroy
    public function destroy($id)
    {
        $news = DB::table('gallery')->where('id', $id)->first();
        $oldIamgeName = public_path('images/gallery/'.$news->image);

        if (file_exists($oldIamgeName)) {
            @unlink($oldIamgeName);
        }
        DB::table('gallery')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $gallery = DB::table('gallery')->where('id', $id)->first();

        return view('admin.gallery.edit', compact('gallery'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'album' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $gallery = DB::table('gallery')->where('id', $id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/gallery/'.$gallery->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldIamgeName)) {
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000, 99999).'gallery.'.$image->getClientOriginalExtension();
            optimizeImageUpload($image, 'images/gallery/', $imageName);
        } else {
            $imageName = $gallery->image;
        }

        $gallery = [
            'album' => $request->album,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ];

        DB::table('gallery')->where('id', $id)->update($gallery);

        return redirect()->back()->with('update', 'Successfully Updated News');
    }
}
