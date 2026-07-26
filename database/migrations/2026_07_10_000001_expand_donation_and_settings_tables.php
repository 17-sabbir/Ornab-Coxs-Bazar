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
        if (!Schema::hasTable('donation_campaigns')) {
            Schema::create('donation_campaigns', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('purpose')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->integer('order')->default(0);
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('donations', 'donation_type')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->string('donation_type')->default('one_time')->after('amount');
                $table->unsignedBigInteger('campaign_id')->nullable()->after('donation_type');
                $table->text('purpose')->nullable()->after('campaign_id');
                $table->boolean('is_anonymous')->default(false)->after('purpose');
                $table->foreign('campaign_id')->references('id')->on('donation_campaigns')->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('applications', 'site_name')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->string('site_name')->nullable()->after('fav_icon');
                $table->text('footer_text')->nullable()->after('site_name');
                $table->string('copyright_text')->nullable()->after('footer_text');
                $table->string('contact_email')->nullable()->after('copyright_text');
                $table->string('contact_phone')->nullable()->after('contact_email');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('donations', 'campaign_id')) {
            Schema::table('donations', function (Blueprint $table) {
                $table->dropForeign(['campaign_id']);
                $table->dropColumn(['donation_type', 'campaign_id', 'purpose', 'is_anonymous']);
            });
        }

        if (Schema::hasColumn('applications', 'site_name')) {
            Schema::table('applications', function (Blueprint $table) {
                $table->dropColumn(['site_name', 'footer_text', 'copyright_text', 'contact_email', 'contact_phone']);
            });
        }

        Schema::dropIfExists('donation_campaigns');
    }
};
