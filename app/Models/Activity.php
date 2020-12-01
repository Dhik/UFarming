<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'activity';
    protected $fillable = [
        'id', 'title', 'id_myplant'
    ];
}
