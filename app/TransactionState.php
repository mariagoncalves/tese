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

    public function transaction() {
        return $this->hasOne('App\Transaction', 'id', 'transaction_id');
    }

    public function tState() {
        return $this->hasOne('App\TState', 'id', 't_state_id');
    }

    public function agent() {
        return $this->hasOne('App\Agent', 'id', 'agent_id');
    }

    public function transactionAck() {
        return $this->hasMany('App\TransactionAck', 'transaction_state_id', 'id');
    }
}
