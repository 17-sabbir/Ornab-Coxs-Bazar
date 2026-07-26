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
        // Enhance applications table for centralized settings
        if (Schema::hasTable('applications')) {
            Schema::table('applications', function (Blueprint $table) {
                if (!Schema::hasColumn('applications', 'address')) {
                    $table->text('address')->nullable();
                }
                if (!Schema::hasColumn('applications', 'latitude')) {
                    $table->decimal('latitude', 10, 8)->nullable()->after('address');
                }
                if (!Schema::hasColumn('applications', 'longitude')) {
                    $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
                }
                if (!Schema::hasColumn('applications', 'google_map_embed')) {
                    $table->text('google_map_embed')->nullable()->after('longitude');
                }
                if (!Schema::hasColumn('applications', 'facebook')) {
                    $table->string('facebook')->nullable()->after('google_map_embed');
                }
                if (!Schema::hasColumn('applications', 'twitter')) {
                    $table->string('twitter')->nullable()->after('facebook');
                }
                if (!Schema::hasColumn('applications', 'linkedin')) {
                    $table->string('linkedin')->nullable()->after('twitter');
                }
                if (!Schema::hasColumn('applications', 'instagram')) {
                    $table->string('instagram')->nullable()->after('linkedin');
                }
                if (!Schema::hasColumn('applications', 'youtube')) {
                    $table->string('youtube')->nullable()->after('instagram');
                }
                if (!Schema::hasColumn('applications', 'statistics_donors')) {
                    $table->integer('statistics_donors')->default(0)->after('youtube');
                }
                if (!Schema::hasColumn('applications', 'statistics_beneficiaries')) {
                    $table->integer('statistics_beneficiaries')->default(0)->after('statistics_donors');
                }
                if (!Schema::hasColumn('applications', 'statistics_projects')) {
                    $table->integer('statistics_projects')->default(0)->after('statistics_beneficiaries');
                }
                if (!Schema::hasColumn('applications', 'statistics_volunteers')) {
                    $table->integer('statistics_volunteers')->default(0)->after('statistics_projects');
                }
            });
        }

        // Add SEO fields to latest_news
        if (Schema::hasTable('latest_news')) {
            Schema::table('latest_news', function (Blueprint $table) {
                if (!Schema::hasColumn('latest_news', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('title');
                }
                if (!Schema::hasColumn('latest_news', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('latest_news', 'og_image')) {
                    $table->string('og_image')->nullable()->after('meta_description');
                }
            });
        }

        // Add SEO fields to projects
        if (Schema::hasTable('projects')) {
            Schema::table('projects', function (Blueprint $table) {
                if (!Schema::hasColumn('projects', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('project_name');
                }
                if (!Schema::hasColumn('projects', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('projects', 'og_image')) {
                    $table->string('og_image')->nullable()->after('meta_description');
                }
            });
        }

        // Add SEO fields to stories
        if (Schema::hasTable('stories')) {
            Schema::table('stories', function (Blueprint $table) {
                if (!Schema::hasColumn('stories', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('beneficiary_title');
                }
                if (!Schema::hasColumn('stories', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('stories', 'og_image')) {
                    $table->string('og_image')->nullable()->after('meta_description');
                }
            });
        }

        // Add SEO fields to publications
        if (Schema::hasTable('publications')) {
            Schema::table('publications', function (Blueprint $table) {
                if (!Schema::hasColumn('publications', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('title');
                }
                if (!Schema::hasColumn('publications', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('publications', 'og_image')) {
                    $table->string('og_image')->nullable()->after('meta_description');
                }
            });
        }

        // Add SEO fields to programs
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                if (!Schema::hasColumn('programs', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('title');
                }
                if (!Schema::hasColumn('programs', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('programs', 'og_image')) {
                    $table->string('og_image')->nullable()->after('meta_description');
                }
            });
        }

        // Add spam_protection_enabled flag to applications
        if (Schema::hasTable('applications') && !Schema::hasColumn('applications', 'spam_protection_enabled')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->boolean('spam_protection_enabled')->default(true)->after('youtube');
                $table->string('recaptcha_site_key')->nullable()->after('spam_protection_enabled');
                $table->string('recaptcha_secret_key')->nullable()->after('recaptcha_site_key');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('applications')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->dropColumn([
                    'address', 'latitude', 'longitude', 'google_map_embed',
                    'facebook', 'twitter', 'linkedin', 'instagram', 'youtube',
                    'statistics_donors', 'statistics_beneficiaries',
                    'statistics_projects', 'statistics_volunteers',
                    'spam_protection_enabled', 'recaptcha_site_key', 'recaptcha_secret_key'
                ]);
            });
        }

        $tables = ['latest_news', 'projects', 'stories', 'publications', 'programs'];
        $seoColumns = ['meta_title', 'meta_description', 'og_image'];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) use ($seoColumns) {
                    $table->dropColumn($seoColumns);
                });
            }
        }
    }
};