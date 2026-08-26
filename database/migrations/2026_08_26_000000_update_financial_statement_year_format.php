<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('financial_statements', function (Blueprint $table) {
            $table->string('year', 9)->change();
        });

        DB::table('financial_statements')
            ->get(['id', 'year'])
            ->filter(fn (object $statement): bool => preg_match('/^\d{4}$/', $statement->year) === 1)
            ->each(function (object $statement): void {
                $endingYear = (int) $statement->year;

                DB::table('financial_statements')
                    ->where('id', $statement->id)
                    ->update(['year' => ($endingYear - 1) . '-' . $endingYear]);
            });
    }

    public function down(): void
    {
        DB::table('financial_statements')
            ->get(['id', 'year'])
            ->filter(fn (object $statement): bool => preg_match('/^\d{4}-\d{4}$/', $statement->year) === 1)
            ->each(function (object $statement): void {
                DB::table('financial_statements')
                    ->where('id', $statement->id)
                    ->update(['year' => substr($statement->year, 5, 4)]);
            });

        Schema::table('financial_statements', function (Blueprint $table) {
            $table->string('year', 4)->change();
        });
    }
};
