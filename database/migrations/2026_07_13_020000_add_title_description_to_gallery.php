<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('gallery')) {
            Schema::table('gallery', function (Blueprint $table) {
                if (!Schema::hasColumn('gallery', 'title')) {
                    $table->string('title')->nullable()->after('album');
                }
                if (!Schema::hasColumn('gallery', 'description')) {
                    $table->text('description')->nullable()->after('title');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('gallery')) {
            Schema::table('gallery', function (Blueprint $table) {
                if (Schema::hasColumn('gallery', 'title')) {
                    $table->dropColumn('title');
                }
                if (Schema::hasColumn('gallery', 'description')) {
                    $table->dropColumn('description');
                }
            });
        }
    }
};
