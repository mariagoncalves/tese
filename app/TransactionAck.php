<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionAck extends Model
{
    protected $table = 'transaction_ack';

    public $timestamps = false;

    protected $fillable = [
        'agent_id',
        'viewed_on',
        'transaction_state_id'
    ];

    protected $guarded = [];

    public function transactionState() {
        return $this->hasOne('App\TransactionState', 'id', 'transaction_state_id');
    }

    public function agent() {
        return $this->hasOne('App\Agent', 'id', 'agent_id');
    }

}
