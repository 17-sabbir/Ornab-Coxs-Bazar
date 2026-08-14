<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('policy_guideline', function (Blueprint $table) {
            $table->boolean('download_allowed')->default(true)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('policy_guideline', function (Blueprint $table) {
            $table->dropColumn('download_allowed');
        });
    }
};
