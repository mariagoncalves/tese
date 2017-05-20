<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_name',
        'password',
        'email'
    ];

    protected $guarded = [];
}
