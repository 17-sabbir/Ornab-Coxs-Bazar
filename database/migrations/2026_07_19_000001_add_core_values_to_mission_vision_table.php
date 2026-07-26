<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('mission_vision', 'core_values')) {
            Schema::table('mission_vision', function (Blueprint $table) {
                $table->text('core_values')->nullable()->after('vision');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('mission_vision', 'core_values')) {
            Schema::table('mission_vision', function (Blueprint $table) {
                $table->dropColumn('core_values');
            });
        }
    }
};
