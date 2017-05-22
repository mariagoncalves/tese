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

    public function stateCausalLink() {
        return $this->hasMany('App\CausalLink', 't_state_id', 'id');
    }

    public function waitedFact() {
        return $this->hasMany('App\WaitingLink', 'waited_fact', 'id');
    }

    public function waitingFact() {
        return $this->hasMany('App\WaitingLink', 'waiting_fact', 'id');
    }

    public function entType() {
        return $this->hasMany('App\EntType', 't_state_id', 'id');
    }

    public function transactionsState() {
        return $this->hasMany('App\TransactionState', 't_state_id', 'id');
    }

}
