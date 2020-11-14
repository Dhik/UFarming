<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnFromPlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plant', function (Blueprint $table) {
            $table->renameColumn('nama_tanaman', 'plant_name');
            $table->renameColumn('foto', 'picture');
            $table->dropColumn(['jenis', 'remember_token']);
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
            $table->renameColumn('plant_name', 'nama_tanaman');
            $table->renameColumn('picture', 'foto',);
            $table->char('jenis',45);
            $table->rememberToken();
        });
    }
}
