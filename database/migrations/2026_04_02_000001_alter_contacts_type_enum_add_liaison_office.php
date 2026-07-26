<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // MySQL enum alteration: add liaison_office.
        DB::statement(
            "ALTER TABLE `contacts` MODIFY `type` ENUM('head_office','liaison_office','branch','person') NOT NULL"
        );
    }

    public function down(): void
    {
        // Reverting will fail if any rows still use 'liaison_office'.
        DB::statement(
            "ALTER TABLE `contacts` MODIFY `type` ENUM('head_office','branch','person') NOT NULL"
        );
    }
};
