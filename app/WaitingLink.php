<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaitingLink extends Model
{
    protected $table = 'waiting_link';

    public $timestamps = false;

    protected $fillable = [
        'waited_t',
        'waited_fact',
        'waiting_fact',
        'waiting_transaction',
        'min',
        'max'
    ];

    protected $guarded = [];
}
