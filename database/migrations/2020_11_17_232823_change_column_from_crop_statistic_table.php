<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnFromCropStatisticTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crop_statistic', function (Blueprint $table) {
            $table->renameColumn('germ_days', 'germ_days_low');
            $table->renameColumn('germ_temperature', 'germ_temperature_low');
            $table->renameColumn('growth_days', 'growth_days_low');
            $table->renameColumn('height', 'height_low');
            $table->renameColumn('pH', 'pH_low');
            $table->renameColumn('spacing', 'spacing_low');
            $table->renameColumn('temperature', 'temperature_low');
            $table->renameColumn('width', 'width_low');

            $table->integer('germ_days_up')->nullable();
            $table->integer('germ_temperature_up')->nullable();
            $table->integer('growth_days_up')->nullable();
            $table->double('height_up')->nullable();
            $table->double('pH_up')->nullable();
            $table->double('spacing_up')->nullable();
            $table->double('temperature_up')->nullable();
            $table->double('width_up')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crop_statistic', function (Blueprint $table) {
            $table->renameColumn('germ_days_low', 'germ_days');
            $table->renameColumn('germ_temperature_low', 'germ_temperature');
            $table->renameColumn('growth_days_low', 'growth_days');
            $table->renameColumn('height_low', 'height');
            $table->renameColumn('pH_low', 'pH');
            $table->renameColumn('spacing_low', 'spacing');
            $table->renameColumn('temperature_low', 'temperature');
            $table->renameColumn('width_low', 'width');

            $table->dropColumn([
                'germ_days_up',
                'germ_temperature_up',
                'growth_days_up',
                'height_up',
                'pH_up',
                'spacing_up',
                'temperature_up',
                'width_up'
            ]);
        });
    }
}
