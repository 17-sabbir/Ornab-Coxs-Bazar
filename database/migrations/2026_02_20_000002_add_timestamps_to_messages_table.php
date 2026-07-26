<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('messages')) {
            return;
        }

        Schema::table('messages', function (Blueprint $table) {
            if (! Schema::hasColumn('messages', 'created_at')) {
                $table->timestamp('created_at')->nullable()->useCurrent();
            }
            if (! Schema::hasColumn('messages', 'updated_at')) {
                $table->timestamp('updated_at')->nullable()->useCurrent();
            }
        });

        // Backfill timestamps for existing rows
        DB::table('messages')
            ->whereNull('created_at')
            ->update(['created_at' => now()]);

        DB::table('messages')
            ->whereNull('updated_at')
            ->update(['updated_at' => now()]);
    }

    public function down(): void
    {
        if (! Schema::hasTable('messages')) {
            return;
        }

        Schema::table('messages', function (Blueprint $table) {
            if (Schema::hasColumn('messages', 'updated_at')) {
                $table->dropColumn('updated_at');
            }
            if (Schema::hasColumn('messages', 'created_at')) {
                $table->dropColumn('created_at');
            }
        });
    }
};
