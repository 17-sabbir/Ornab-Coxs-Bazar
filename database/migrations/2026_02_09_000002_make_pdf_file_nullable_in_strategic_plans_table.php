<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Normalize existing empty strings to NULL
        DB::table('strategic_plans')->where('pdf_file', '')->update(['pdf_file' => null]);

        // Make column nullable using Schema builder (works for all databases)
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('pdf_file', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ensure no NULLs before making NOT NULL
        DB::table('strategic_plans')->whereNull('pdf_file')->update(['pdf_file' => '']);

        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('pdf_file', 255)->nullable(false)->change();
        });
    }
};
