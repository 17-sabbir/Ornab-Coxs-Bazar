<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('volunteer_info', function (Blueprint $table) {
            $table->id();
            $table->text('what_you_can_do')->nullable();
            $table->text('eligibility')->nullable();
            $table->text('benefits')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('volunteer_info');
    }
};
