<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TState extends Model
{
    protected $table = 't_state';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];
}
