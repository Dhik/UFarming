<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->char('category',45);
            $table->text('desc');
            $table->string('foto');
            $table->string('source');
            $table->uuid('id_plant');
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
        Schema::dropIfExists('article');
    }
}
