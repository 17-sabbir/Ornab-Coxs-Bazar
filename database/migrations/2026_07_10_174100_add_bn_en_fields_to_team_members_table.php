<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Team Members
        Schema::table('team_members', function (Blueprint $table) {
            if (!Schema::hasColumn('team_members', 'description')) {
                $table->text('description')->nullable()->after('bio');
            }
            if (!Schema::hasColumn('team_members', 'status')) {
                $table->boolean('status')->default(true)->after('order');
            }
        });
    }
};
