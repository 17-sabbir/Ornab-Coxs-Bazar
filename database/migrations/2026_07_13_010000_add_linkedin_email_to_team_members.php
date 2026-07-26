<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('team_members')) {
            Schema::table('team_members', function (Blueprint $table) {
                if (!Schema::hasColumn('team_members', 'linkedin')) {
                    $table->string('linkedin')->nullable()->after('youtube');
                }
                if (!Schema::hasColumn('team_members', 'email')) {
                    $table->string('email')->nullable()->after('linkedin');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('team_members')) {
            Schema::table('team_members', function (Blueprint $table) {
                if (Schema::hasColumn('team_members', 'linkedin')) {
                    $table->dropColumn('linkedin');
                }
                if (Schema::hasColumn('team_members', 'email')) {
                    $table->dropColumn('email');
                }
            });
        }
    }
};
