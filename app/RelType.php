<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelType extends Model
{
    protected $table = 'rel_type';

    public $timestamps = false;

    protected $fillable = [
        'ent_type1_id',
        'ent_type2_id',
        'state',
        'updated_on',
        'name',
        'transaction_type_id'
    ];

    protected $guarded = [];

    public function transactionsType() {
        return $this->hasOne('App\TransactionType', 'id', 'transaction_type_id');
    }

    public function relations() {
        return $this->hasMany('App\Relation', 'rel_type_id', 'id');
    }

    public function properties() {
        return $this->hasMany('App\Property', 'rel_type_id', 'id');
    }

    public function ent1() {
        return $this->hasOne('App\EntType', 'id', 'ent_type1_id');
    }

    public function ent2() {
        return $this->hasOne('App\EntType', 'id', 'ent_type2_id');
    }
}
