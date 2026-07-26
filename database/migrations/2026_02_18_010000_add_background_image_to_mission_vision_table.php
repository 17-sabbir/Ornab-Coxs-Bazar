<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('mission_vision')) {
            return;
        }

        if (Schema::hasColumn('mission_vision', 'background_image')) {
            return;
        }

        Schema::table('mission_vision', function (Blueprint $table) {
            $table->string('background_image')->nullable()->after('mission');
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('mission_vision')) {
            return;
        }

        if (!Schema::hasColumn('mission_vision', 'background_image')) {
            return;
        }

        Schema::table('mission_vision', function (Blueprint $table) {
            $table->dropColumn('background_image');
        });
    }
};
