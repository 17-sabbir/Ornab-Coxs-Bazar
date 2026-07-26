<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    // add
    public function add()
    {
        return view('admin.latest_news.add');
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'news_date' => 'required|date',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999).'news.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/news/'), $imageName);
        }

        $news = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'news_date' => $request->news_date,
        ];

        DB::table('latest_news')->insert($news);

        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $news = DB::table('latest_news')->orderBy('news_date', 'desc')->orderBy('id', 'desc')->get();

        return view('admin.latest_news.index', compact('news'));
    }

    // Destroy
    public function destroy($id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();
        $oldIamgeName = public_path('images/news/'.$news->image);

        if (file_exists($oldIamgeName)) {
            @unlink($oldIamgeName);
        }
        DB::table('latest_news')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();

        return view('admin.latest_news.edit', compact('news'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
            'news_date' => 'required|date',
        ]);

        $news = DB::table('latest_news')->where('id', $id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/news/'.$news->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldIamgeName)) {
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000, 99999).'news.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
        } else {
            $imageName = $news->image;
        }

        $news = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'news_date' => $request->news_date,
        ];

        DB::table('latest_news')->where('id', $id)->update($news);

        return redirect()->back()->with('update', 'Successfully Updated News');
    }
}
