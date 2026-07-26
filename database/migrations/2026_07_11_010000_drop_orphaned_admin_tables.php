<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('impacts');
        Schema::dropIfExists('organization_profiles');
        Schema::dropIfExists('organograms');
        Schema::dropIfExists('objectives');
        Schema::dropIfExists('testimonials');
    }

    public function down(): void
    {
        //
    }
};
