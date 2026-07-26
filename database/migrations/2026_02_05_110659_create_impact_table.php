<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impact', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('metric_value');
            $table->string('metric_unit')->nullable();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->integer('year')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impact');
    }
}
