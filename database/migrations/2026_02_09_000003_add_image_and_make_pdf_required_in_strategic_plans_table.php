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
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
        });

        // Ensure column is NOT NULL using Schema builder
        DB::table('strategic_plans')->whereNull('pdf_file')->update(['pdf_file' => '']);
        
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('pdf_file', 255)->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Make nullable again
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('pdf_file', 255)->nullable()->change();
        });

        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
