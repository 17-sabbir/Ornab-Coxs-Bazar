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
        Schema::create('organization_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->nullable();
            $table->text('head_office_address')->nullable();
            $table->text('liaison_office_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('contact_person')->nullable();
            $table->date('establishment_year')->nullable();
            $table->text('organization_type')->nullable();
            $table->string('ngo_bureau_reg_no')->nullable();
            $table->date('ngo_bureau_reg_date')->nullable();
            $table->string('social_welfare_reg_no')->nullable();
            $table->date('social_welfare_reg_date')->nullable();
            $table->text('background_info')->nullable();
            $table->string('vision')->nullable();
            $table->string('mission')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_profiles');
    }
};
