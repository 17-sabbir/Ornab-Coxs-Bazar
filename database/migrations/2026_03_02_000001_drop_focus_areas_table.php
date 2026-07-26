<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('focus_areas');
    }

    public function down(): void
    {
        // Intentionally left empty — this drop is permanent by design.
    }
};
