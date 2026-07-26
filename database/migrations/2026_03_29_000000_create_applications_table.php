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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('main_logo')->nullable()->comment('Main logo filename');
            $table->string('fav_icon')->nullable()->comment('Favicon filename');
            $table->string('facebook')->nullable()->comment('Facebook link');
            $table->string('twitter')->nullable()->comment('Twitter link');
            $table->string('instagram')->nullable()->comment('Instagram link');
            $table->string('youtube')->nullable()->comment('YouTube link');
            $table->timestamps();
        });

        // Insert initial record (id = 1)
        DB::table('applications')->insert([
            'id' => 1,
            'main_logo' => null,
            'fav_icon' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'youtube' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
