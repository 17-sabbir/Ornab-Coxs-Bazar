<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('projects:import-ongoing', function () {
    if (!DB::getSchemaBuilder()->hasTable('ongoing_project')) {
        $this->error('Table ongoing_project not found. Nothing to import.');
        return self::FAILURE;
    }

    if (!DB::getSchemaBuilder()->hasTable('projects')) {
        $this->error('Table projects not found. Run migrations first.');
        return self::FAILURE;
    }

    if (!DB::getSchemaBuilder()->hasColumn('projects', 'legacy_ongoing_project_id')) {
        $this->error('Column projects.legacy_ongoing_project_id missing. Run migrations first.');
        return self::FAILURE;
    }

    $rows = DB::table('ongoing_project')->orderBy('id')->get();
    $imported = 0;
    $skipped = 0;

    foreach ($rows as $row) {
        $exists = Project::where('legacy_ongoing_project_id', $row->id)->exists();
        if ($exists) {
            $skipped++;
            continue;
        }

        $parsed = parse_project_duration_years($row->duration ?? null);

        $project = new Project();
        $project->project_name = $row->title;
        $project->objectives = $row->objective ?? $row->description;
        $project->locations = $row->location;
        $project->donors = $row->donors;
        $project->total_beneficiary = null;
        $project->priority = (int) ($row->priority ?? 0);
        $project->remark = $row->remark;
        $project->image = $row->image;
        $project->status = 'ongoing';
        $project->start_year = data_get($parsed, 'start_year');
        $project->end_year = null;
        $project->is_continuing = true;
        $project->legacy_ongoing_project_id = $row->id;
        $project->project_duration = project_period($project) ?: ($row->duration ?? null);
        $project->created_at = $row->created_at ?? now();
        $project->updated_at = $row->updated_at ?? now();
        $project->save();

        $imported++;
    }

    $this->info("Imported: {$imported}, skipped (already imported): {$skipped}");
    return self::SUCCESS;
})->purpose('Import legacy ongoing_project rows into projects table');

Artisan::command('projects:backfill-period', function () {
    $projects = Project::orderBy('id')->get();
    $updated = 0;

    foreach ($projects as $project) {
        if (!empty($project->start_year) || empty($project->project_duration)) {
            continue;
        }

        $parsed = parse_project_duration_years($project->project_duration);
        $startYear = data_get($parsed, 'start_year');
        if (empty($startYear)) {
            continue;
        }

        $project->start_year = (int) $startYear;
        if ($project->status === 'ongoing') {
            $project->is_continuing = true;
            $project->end_year = null;
        } else {
            $project->is_continuing = false;
            $project->end_year = data_get($parsed, 'end_year') ?: (int) now()->format('Y');
        }

        $project->project_duration = project_period($project);
        $project->save();
        $updated++;
    }

    $this->info("Backfilled period fields for {$updated} project(s)");
    return self::SUCCESS;
})->purpose('Backfill start_year/end_year/is_continuing from legacy project_duration');
