<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('ongoing_project')) {
            Schema::table('ongoing_project', function (Blueprint $table) {
                $table->integer('priority')->default(0)->after('description')->comment('Higher value means higher priority');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('ongoing_project')) {
            Schema::table('ongoing_project', function (Blueprint $table) {
                $table->dropColumn('priority');
            });
        }
    }
};