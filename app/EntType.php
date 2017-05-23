<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntType extends Model
{
    protected $table = 'ent_type';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on',
        'transaction_type_id',
        'ent_type_id'
    ];

    protected $guarded = [];

    public function transactionsType() {
        return $this->hasOne('App\TransactionType', 'id', 'transaction_type_id');
    }

    public function tStates() {
        return $this->hasOne('App\TState', 'id', 't_state_id');
    }

    public function entity() {
        return $this->hasMany('App\Entity', 'ent_type_id', 'id');
    }

    public function relType1() {
        return $this->hasMany('App\RelType', 'ent_type1_id', 'id');
    }

    public function relType2() {
        return $this->hasMany('App\RelType', 'ent_type2_id', 'id');
    }

    //Confirmar relação! É de um para um??
    public function entType() {
        return $this->hasOne('App\EntType', 'ent_type_id', 'id');
    }

    public function fkEntType() {
        return $this->hasMany('App\Property', 'fk_ent_type_id', 'id');
    }

    public function properties() {
        return $this->hasMany('App\Property', 'ent_type_id', 'id');
    }


}
