<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $table = 'activity';
    protected $fillable = [
        'id', 'title', 'id_myplant'
    ];
}
