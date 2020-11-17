<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CropStatistic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'crop_statistic';
    protected $fillable = [
        'id',
        'id_plant',
        'germ_days_low',
        'germ_days_up',
        'germ_temperature_low',
        'germ_temperature_up',
        'growth_days_low',
        'growth_days_up',
        'height_low',
        'height_up',
        'ph_low',
        'ph_up',
        'spacing_low',
        'spacing_up',
        'temperature_low',
        'temperature_up',
        'width_low',
        'width_up'
    ];
}
