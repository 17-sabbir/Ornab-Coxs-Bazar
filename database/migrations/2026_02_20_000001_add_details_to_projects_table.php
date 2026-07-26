<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'priority')) {
                $table->unsignedInteger('priority')->default(0)->after('total_beneficiary');
            }
            if (!Schema::hasColumn('projects', 'remark')) {
                $table->text('remark')->nullable()->after('priority');
            }
            if (!Schema::hasColumn('projects', 'image')) {
                $table->string('image')->nullable()->after('remark');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'image')) {
                $table->dropColumn('image');
            }
            if (Schema::hasColumn('projects', 'remark')) {
                $table->dropColumn('remark');
            }
            if (Schema::hasColumn('projects', 'priority')) {
                $table->dropColumn('priority');
            }
        });
    }
};
