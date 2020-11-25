<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $incrementing = false;
    protected $table = 'checklist';
    protected $fillable = [
        'id', 'title', 'is_checked', 'desc', 'id_myplant'
    ];
}
