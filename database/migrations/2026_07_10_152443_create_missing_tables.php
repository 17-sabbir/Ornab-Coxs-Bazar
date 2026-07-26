<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Create tables that were missing from original migrations
        $tables = [
            'about_us' => function (Blueprint $table) {
                $table->id();
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->timestamps();
            },
            'slider' => function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->string('link')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
            },
            'latest_news' => function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->date('news_date')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            },
            'partners' => function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('logo')->nullable();
                $table->string('url')->nullable();
                $table->string('type')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('order')->default(0);
                $table->timestamps();
            },
            'gallery' => function (Blueprint $table) {
                $table->id();
                $table->string('album')->nullable();
                $table->string('image');
                $table->text('caption')->nullable();
                $table->timestamps();
            },
            'subscribe' => function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamps();
            },
            'legal_affilation' => function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('document')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            },
            'chief_executive_message' => function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('designation')->nullable();
                $table->text('message')->nullable();
                $table->string('image')->nullable();
                $table->string('signature')->nullable();
                $table->timestamps();
            },
            'policy_guideline' => function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('file')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            },
            'invoked' => function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('file')->nullable();
                $table->date('deadline')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            },
        ];

        foreach ($tables as $name => $blueprint) {
            if (!Schema::hasTable($name)) {
                Schema::create($name, $blueprint);
            }
        }

        // Add missing columns to latest_news if table exists but column missing
        if (Schema::hasTable('latest_news') && !Schema::hasColumn('latest_news', 'news_date')) {
            Schema::table('latest_news', function (Blueprint $table) {
                $table->date('news_date')->nullable();
            });
        }
    }

    public function down(): void
    {
        // Only drop tables we created here
        $tables = ['about_us', 'slider', 'partners', 'gallery', 'subscribe',
                    'legal_affilation', 'chief_executive_message', 'policy_guideline', 'invoked'];
        foreach ($tables as $table) {
            if (Schema::hasTable($table)) {
                Schema::dropIfExists($table);
            }
        }
    }
};