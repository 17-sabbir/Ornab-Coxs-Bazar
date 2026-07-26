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
                $table->text('objective')->after('title')->nullable();
                $table->string('location')->after('objective')->nullable();
                $table->string('duration')->after('location')->nullable();
                $table->string('donors')->after('duration')->nullable();
                $table->string('remark')->after('donors')->nullable();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('ongoing_project')) {
            Schema::table('ongoing_project', function (Blueprint $table) {
                $table->dropColumn(['objective', 'location', 'duration', 'donors', 'remark']);
            });
        }
    }
};