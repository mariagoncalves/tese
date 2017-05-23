<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    public $timestamps = false;

    protected $fillable = [
        'transaction_type_id',
        'transaction_name',
        'state',
        'updated_on',
        'process_id'
    ];

    protected $guarded = [];

    public function process() {
        return $this->hasOne('App\Process', 'id', 'process_id');
    }

    public function transactionType() {
        return $this->hasOne('App\TransactionType', 'id', 'transaction_type_id');
    }

    public function transactionStates() {
        return $this->hasMany('App\TransactionState', 'transaction_id', 'id');
    }
}
