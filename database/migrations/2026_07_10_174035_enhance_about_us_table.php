<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            if (!Schema::hasColumn('about_us', 'about_us')) {
                $table->text('about_us')->nullable()->after('id');
            }
            if (!Schema::hasColumn('about_us', 'vision')) {
                $table->text('vision')->nullable()->after('about_us');
            }
            if (!Schema::hasColumn('about_us', 'mission')) {
                $table->text('mission')->nullable()->after('vision');
            }
            if (!Schema::hasColumn('about_us', 'our_story')) {
                $table->text('our_story')->nullable()->after('mission');
            }
            if (!Schema::hasColumn('about_us', 'registration_info')) {
                $table->text('registration_info')->nullable()->after('our_story');
            }
            if (!Schema::hasColumn('about_us', 'about_image')) {
                $table->string('about_image')->nullable()->after('registration_info');
            }
            if (!Schema::hasColumn('about_us', 'vision_image')) {
                $table->string('vision_image')->nullable()->after('about_image');
            }
            if (!Schema::hasColumn('about_us', 'mission_image')) {
                $table->string('mission_image')->nullable()->after('vision_image');
            }
            if (!Schema::hasColumn('about_us', 'story_image')) {
                $table->string('story_image')->nullable()->after('mission_image');
            }
            if (!Schema::hasColumn('about_us', 'registration_image')) {
                $table->string('registration_image')->nullable()->after('story_image');
            }
        });

        // Migrate existing description to about_us
        if (Schema::hasColumn('about_us', 'description') && Schema::hasColumn('about_us', 'about_us')) {
            DB::statement('UPDATE about_us SET about_us = description WHERE about_us IS NULL AND description IS NOT NULL');
        }
    }

    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $columns = [
                'about_us', 'vision', 'mission', 'our_story', 'registration_info',
                'about_image', 'vision_image', 'mission_image', 'story_image', 'registration_image',
            ];
            foreach ($columns as $col) {
                if (Schema::hasColumn('about_us', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
