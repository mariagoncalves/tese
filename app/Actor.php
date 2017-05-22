<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actor';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

    public function role() {

    	return $this->belongsToMany('App\Role', 'role_has_actor');
    }

    public function executaTransactionType() {

    	return $this->hasMany('App\TransactionType', 'executer', 'id');
    }

    public function iniciaTransactionType() {

    	return $this->belongsToMany('App\TransactionType', 'actor_iniciates_t');
    }
}
