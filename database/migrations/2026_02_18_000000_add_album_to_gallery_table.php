<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('gallery')) {
            return;
        }

        if (Schema::hasColumn('gallery', 'album')) {
            return;
        }

        Schema::table('gallery', function (Blueprint $table) {
            $table->string('album')->nullable()->after('id');
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('gallery')) {
            return;
        }

        if (! Schema::hasColumn('gallery', 'album')) {
            return;
        }

        Schema::table('gallery', function (Blueprint $table) {
            $table->dropColumn('album');
        });
    }
};
