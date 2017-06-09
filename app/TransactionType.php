<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'transaction_type';

    public $timestamps = true;

    protected $fillable = [
        'state',
        'process_type_id',
        'executer'
    ];

    protected $guarded = [];


    public function executerActor() {
        return $this->hasOne('App\Actor', 'id', 'executer');
    }

    public function iniciatorActor() {
        return $this->belongsToMany('App\Actor', 'actor_iniciates_t');
    }

    public function entType() {
        return $this->hasOne('App\EntType', 'transaction_type_id', 'id');
    }

    public function relType() {
        return $this->hasOne('App\RelType', 'transaction_type_id', 'id');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction', 'transaction_type_id', 'id');
    }

    public function causedTransaction() {
        return $this->hasMany('App\CausalLink', 'caused_t', 'id');
    }

    public function causingTransaction() {
        return $this->hasMany('App\CausalLink', 'causing_t', 'id');
    }

    public function processType() {
        return $this->hasOne('App\ProcessType', 'process_type_id', 'id');
    }

    public function waitedTransaction() {
        return $this->hasMany('App\WaitingLink', 'waited_t', 'id');
    }

    public function waitingTransaction() {
        return $this->hasMany('App\WaitingLink', 'waiting_transaction', 'id');
    }

    public function transactionTypeName() {
        return $this->hasMany('App\TransactionTypeName', 'transaction_type_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }

}
