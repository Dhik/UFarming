<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeColumnToPlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plant', function (Blueprint $table) {
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard']);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('type_id');
            $table->integer('stages')->default(0);
            $table->integer('total_days')->default(0);
            $table->integer('success_rate')->default(0.0);

            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('type_id')->references('id')->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plant', function (Blueprint $table) {
            $table->dropColumn(['difficulty', 'category_id', 'type_id', 'stages', 'total_days', 'success_rate']);
        });
    }
}
