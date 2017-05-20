<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CausalLink extends Model
{
    protected $table = 'causal_link';

    public $timestamps = false;

    protected $fillable = [
        'causing_t',
        't_state_id',
        'caused_t',
        'min',
        'max'
    ];

    protected $guarded = [];
}
