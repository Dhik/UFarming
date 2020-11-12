<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_statistic', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_plant');
            $table->foreign('id_plant')->references('id')->on('plant');
            $table->integer('germ_days')->nullable();
            $table->integer('germ_temperature')->nullable();
            $table->integer('growth_days')->nullable();
            $table->double('height')->nullable();
            $table->double('pH')->nullable();
            $table->double('spacing')->nullable();
            $table->double('temperature')->nullable();
            $table->double('width')->nullable();
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
        Schema::dropIfExists('crop_statistic');
    }
}
