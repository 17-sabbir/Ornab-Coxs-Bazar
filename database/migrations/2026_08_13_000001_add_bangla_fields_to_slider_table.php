<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('slider', function (Blueprint $table) {
            $table->string('title_bn')->nullable()->after('title');
            $table->text('description_bn')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('slider', function (Blueprint $table) {
            $table->dropColumn(['title_bn', 'description_bn']);
        });
    }
};
