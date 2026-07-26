<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'start_year')) {
                $table->unsignedSmallInteger('start_year')->nullable()->after('locations');
            }
            if (!Schema::hasColumn('projects', 'end_year')) {
                $table->unsignedSmallInteger('end_year')->nullable()->after('start_year');
            }
            if (!Schema::hasColumn('projects', 'is_continuing')) {
                $table->boolean('is_continuing')->default(false)->after('end_year');
            }
            if (!Schema::hasColumn('projects', 'legacy_ongoing_project_id')) {
                $table->unsignedBigInteger('legacy_ongoing_project_id')->nullable()->after('is_continuing');
                $table->unique('legacy_ongoing_project_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'legacy_ongoing_project_id')) {
                $table->dropUnique(['legacy_ongoing_project_id']);
                $table->dropColumn('legacy_ongoing_project_id');
            }
            if (Schema::hasColumn('projects', 'is_continuing')) {
                $table->dropColumn('is_continuing');
            }
            if (Schema::hasColumn('projects', 'end_year')) {
                $table->dropColumn('end_year');
            }
            if (Schema::hasColumn('projects', 'start_year')) {
                $table->dropColumn('start_year');
            }
        });
    }
};
