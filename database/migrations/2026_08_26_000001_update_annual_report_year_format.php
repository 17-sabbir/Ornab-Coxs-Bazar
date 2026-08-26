<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('annual_reports', function (Blueprint $table) {
            $table->string('year', 9)->change();
        });

        DB::table('annual_reports')
            ->get(['id', 'year'])
            ->filter(fn (object $report): bool => preg_match('/^\d{4}$/', $report->year) === 1)
            ->each(function (object $report): void {
                $endingYear = (int) $report->year;

                DB::table('annual_reports')
                    ->where('id', $report->id)
                    ->update(['year' => ($endingYear - 1) . '–' . $endingYear]);
            });
    }

    public function down(): void
    {
        DB::table('annual_reports')
            ->get(['id', 'year'])
            ->filter(fn (object $report): bool => preg_match('/^\d{4}–\d{4}$/u', $report->year) === 1)
            ->each(function (object $report): void {
                DB::table('annual_reports')
                    ->where('id', $report->id)
                    ->update(['year' => mb_substr($report->year, 5, 4)]);
            });

        Schema::table('annual_reports', function (Blueprint $table) {
            $table->string('year', 4)->change();
        });
    }
};
