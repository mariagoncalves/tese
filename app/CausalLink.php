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

    public function causingTransaction() {
        return $this->hasOne('App\TransactionType', 'id', 'causing_t');
    }

    public function causedTransaction() {
        return $this->hasOne('App\TransactionType', 'id', 'caused_t');
    }

    public function tState() {
        return $this->hasOne('App\TState', 'id', 't_state_id');
    }
}
