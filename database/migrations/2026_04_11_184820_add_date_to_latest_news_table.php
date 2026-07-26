<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('latest_news') && !Schema::hasColumn('latest_news', 'news_date')) {
            Schema::table('latest_news', function (Blueprint $table) {
                $table->date('news_date')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropColumn('news_date');
        });
    }
};
