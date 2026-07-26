<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->default(null)->after('id');
            $table->foreign('parent_id')->references('id')->on('executive_committee')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('executive_committee', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn('parent_id');
        });
    }
};
