<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;

class ProjectListController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $query = Project::query();
        if (in_array($status, ['ongoing', 'completed'], true)) {
            $query->where('status', $status);
        }
        $projects = $query->orderBy('priority', 'desc')->orderBy('created_at', 'desc')->get();
        return view('admin.projects.index', compact('projects', 'status'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name'     => 'required',
            'objectives'       => 'nullable',
            'locations'        => 'nullable',
            'start_year'       => 'required|integer|min:1900|max:2100',
            'end_year'         => 'nullable',
            'donors'           => 'nullable',
            'total_beneficiary'=> 'nullable',
            'status'           => 'required|in:ongoing,completed',
            'priority'         => 'nullable|integer|min:0',
            'remark'           => 'nullable|string',
            'category'         => 'nullable|string',
            'is_featured'      => 'nullable|boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
            'galleries'        => 'nullable|array',
            'galleries.*'      => 'mimes:jpeg,png,jpg,webp,gif',
            'report_file'      => 'nullable|file|mimes:pdf',
        ]);

        $payload = $validated;
        unset($payload['galleries'], $payload['report_file']);

        $endRaw = $request->input('end_year');
        $isContinuing = $payload['status'] === 'ongoing';
        $endYear = null;

        if ($payload['status'] === 'completed') {
            if ($endRaw !== null && $endRaw !== '' && is_numeric($endRaw)) {
                $endYear = (int) $endRaw;
            }
            if ($endYear === null) {
                $endYear = (int) now()->format('Y');
            }
            $isContinuing = false;
        }

        $payload['end_year'] = $endYear;
        $payload['is_continuing'] = $isContinuing;
        $payload['project_duration'] = project_period((object) array_merge($payload, ['status' => $payload['status']]));
        $payload['is_featured'] = $request->boolean('is_featured');

        // Handle main image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand(1000000, 9999999) . 'project.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['image'] = $imageName;
        }

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $imageName = 'cover_' . rand(1000000, 9999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['cover_image'] = $imageName;
        }

        $project = Project::create($payload);

        // Handle gallery uploads
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $galleryFile) {
                $galleryName = 'gallery_' . rand(1000000, 9999999) . '.' . $galleryFile->getClientOriginalExtension();
                $galleryFile->move(public_path('images/project'), $galleryName);
                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image'      => $galleryName,
                ]);
            }
        }

        // Handle report upload
        if ($request->hasFile('report_file')) {
            $reportFile = $request->file('report_file');
            $reportName = 'report_' . rand(1000000, 9999999) . '.' . $reportFile->getClientOriginalExtension();
            $reportFile->move(public_path('images/project/reports'), $reportName);
            \App\Models\ProjectReport::create([
                'project_id' => $project->id,
                'file'       => $reportName,
            ]);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $project->load('galleries', 'reports');
        return view('admin.projects.edit', compact('project'));
    }

    public function show(Project $project)
    {
        return redirect()->route('admin.projects.edit', $project);
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_name'     => 'required',
            'objectives'       => 'nullable',
            'locations'        => 'nullable',
            'start_year'       => 'required|integer|min:1900|max:2100',
            'end_year'         => 'nullable',
            'donors'           => 'nullable',
            'total_beneficiary'=> 'nullable',
            'status'           => 'required|in:ongoing,completed',
            'priority'         => 'nullable|integer|min:0',
            'remark'           => 'nullable|string',
            'category'         => 'nullable|string',
            'is_featured'      => 'nullable|boolean',
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
            'cover_image'      => 'nullable|image|mimes:jpeg,png,jpg,webp,gif',
            'galleries'        => 'nullable|array',
            'galleries.*'      => 'mimes:jpeg,png,jpg,webp,gif',
            'report_file'      => 'nullable|file|mimes:pdf',
        ]);

        $payload = $validated;
        unset($payload['galleries'], $payload['report_file']);

        $endRaw = $request->input('end_year');
        $isContinuing = $payload['status'] === 'ongoing';
        $endYear = null;

        if ($payload['status'] === 'completed') {
            if ($endRaw !== null && $endRaw !== '' && is_numeric($endRaw)) {
                $endYear = (int) $endRaw;
            }
            if ($endYear === null) {
                $endYear = (int) now()->format('Y');
            }
            $isContinuing = false;
        }

        $payload['end_year'] = $endYear;
        $payload['is_continuing'] = $isContinuing;
        $payload['project_duration'] = project_period((object) array_merge($payload, ['status' => $payload['status']]));
        $payload['is_featured'] = $request->boolean('is_featured');

        // Handle main image
        if ($request->hasFile('image')) {
            if (!empty($project->image)) {
                $oldImagePath = public_path('images/project/' . $project->image);
                if (file_exists($oldImagePath)) @unlink($oldImagePath);
            }
            $image = $request->file('image');
            $imageName = rand(1000000, 9999999) . 'project.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['image'] = $imageName;
        }

        // Handle cover image
        if ($request->hasFile('cover_image')) {
            if (!empty($project->cover_image)) {
                $oldPath = public_path('images/project/' . $project->cover_image);
                if (file_exists($oldPath)) @unlink($oldPath);
            }
            $image = $request->file('cover_image');
            $imageName = 'cover_' . rand(1000000, 9999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
            $payload['cover_image'] = $imageName;
        }

        $project->update($payload);

        // Handle gallery uploads
        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $galleryFile) {
                $galleryName = 'gallery_' . rand(1000000, 9999999) . '.' . $galleryFile->getClientOriginalExtension();
                $galleryFile->move(public_path('images/project'), $galleryName);
                ProjectGallery::create([
                    'project_id' => $project->id,
                    'image'      => $galleryName,
                ]);
            }
        }

        // Handle report upload
        if ($request->hasFile('report_file')) {
            $reportFile = $request->file('report_file');
            $reportName = 'report_' . rand(1000000, 9999999) . '.' . $reportFile->getClientOriginalExtension();
            $reportFile->move(public_path('images/project/reports'), $reportName);
            \App\Models\ProjectReport::create([
                'project_id' => $project->id,
                'file'       => $reportName,
            ]);
        }

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function deleteGallery($id)
    {
        $gallery = ProjectGallery::findOrFail($id);
        $path = public_path('images/project/' . $gallery->image);
        if (file_exists($path)) @unlink($path);
        $gallery->delete();
        return redirect()->back()->with('success', 'Gallery image deleted.');
    }

    public function uploadReport(Request $request, Project $project)
    {
        $request->validate([
            'reports' => 'required|array',
            'reports.*' => 'file|mimes:pdf|max:10240',
        ]);

        if ($request->hasFile('reports')) {
            foreach ($request->file('reports') as $file) {
                $fileName = 'report_' . rand(1000000, 9999999) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/project/reports/'), $fileName);

                $project->reports()->create([
                    'file' => $fileName,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Report(s) uploaded successfully.');
    }

    public function deleteReport($id)
    {
        $report = \App\Models\ProjectReport::findOrFail($id);
        $path = public_path('images/project/reports/' . $report->file);
        if (file_exists($path)) @unlink($path);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully.');
    }

    public function toggleStatus(Project $project)
    {
        $newStatus = $project->status === 'ongoing' ? 'completed' : 'ongoing';

        $startYear = $project->start_year;
        if (empty($startYear)) {
            $parsed = parse_project_duration_years($project->project_duration);
            $startYear = $parsed['start_year'] ?? null;
        }

        $updates = [
            'status' => $newStatus,
            'start_year' => $startYear,
        ];

        if ($newStatus === 'completed') {
            $updates['is_continuing'] = false;
            $updates['end_year'] = $project->end_year ?: (int) now()->format('Y');
        } else {
            $updates['is_continuing'] = true;
            $updates['end_year'] = null;
        }

        $updates['project_duration'] = project_period((object) array_merge($project->toArray(), $updates));
        $project->update($updates);

        return redirect()->back()->with('success', 'Project status updated successfully.');
    }

    public function destroy(Project $project)
    {
        if (!empty($project->image)) {
            $oldImagePath = public_path('images/project/' . $project->image);
            if (file_exists($oldImagePath)) @unlink($oldImagePath);
        }
        if (!empty($project->cover_image)) {
            $path = public_path('images/project/' . $project->cover_image);
            if (file_exists($path)) @unlink($path);
        }

        foreach ($project->reports as $report) {
            $path = public_path('images/project/reports/' . $report->file);
            if (file_exists($path)) @unlink($path);
        }
        $project->reports()->delete();

        foreach ($project->galleries as $gallery) {
            $path = public_path('images/project/' . $gallery->image);
            if (file_exists($path)) @unlink($path);
        }
        $project->galleries()->delete();

        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
