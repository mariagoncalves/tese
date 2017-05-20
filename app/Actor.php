<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];
}
