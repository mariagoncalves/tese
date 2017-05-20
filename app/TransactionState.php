<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionState extends Model
{
    protected $table = 'transaction_state';

    public $timestamps = false;

    protected $fillable = [
        'updated_on',
        'transaction_id',
        't_state_id',
        'agent_id'
    ];

    protected $guarded = [];
}
