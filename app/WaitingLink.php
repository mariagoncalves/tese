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

    public function waitingTransaction() {
        return $this->hasOne('App\TransactionType', 'id', 'waiting_transaction');
    }

    public function waitedT() {
        return $this->hasOne('App\TransactionType', 'id', 'waited_t');
    }

    public function waitingFact() {
        return $this->hasOne('App\TState', 'id', 'waiting_fact');
    }

    public function waitedFact() {
        return $this->hasOne('App\TState', 'id', 'waited_fact');
    }
    
}
