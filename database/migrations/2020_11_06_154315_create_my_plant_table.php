<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyPlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_plant', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_user');
            $table->uuid('id_plant');
            $table->double('progress');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_plant')->references('id')->on('plant');
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
        Schema::dropIfExists('my_plant');
    }
}
