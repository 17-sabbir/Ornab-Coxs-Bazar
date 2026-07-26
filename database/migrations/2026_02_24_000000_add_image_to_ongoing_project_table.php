<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('ongoing_project')) {
            Schema::table('ongoing_project', function (Blueprint $table) {
                if (! Schema::hasColumn('ongoing_project', 'image')) {
                    $table->string('image')->nullable()->after('remark');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('ongoing_project')) {
            Schema::table('ongoing_project', function (Blueprint $table) {
                if (Schema::hasColumn('ongoing_project', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
};
