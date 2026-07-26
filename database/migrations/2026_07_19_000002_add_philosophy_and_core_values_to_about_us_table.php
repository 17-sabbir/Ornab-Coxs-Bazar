<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('about_us', 'philosophy')) {
            Schema::table('about_us', function (Blueprint $table) {
                $table->text('philosophy')->nullable()->after('our_story');
            });
        }
        if (! Schema::hasColumn('about_us', 'core_values')) {
            Schema::table('about_us', function (Blueprint $table) {
                $table->text('core_values')->nullable()->after('philosophy');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('about_us', 'core_values')) {
            Schema::table('about_us', function (Blueprint $table) {
                $table->dropColumn('core_values');
            });
        }
        if (Schema::hasColumn('about_us', 'philosophy')) {
            Schema::table('about_us', function (Blueprint $table) {
                $table->dropColumn('philosophy');
            });
        }
    }
};
