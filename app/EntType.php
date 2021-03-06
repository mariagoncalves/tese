<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntType extends Model
{
    protected $table = 'ent_type';

    public $timestamps = true;

    protected $fillable = [
        'state',
        'transaction_type_id',
        'ent_type_id',
        't_state_id',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function transactionsType() {
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }

    public function tStates() {
        return $this->belongsTo('App\TState', 't_state_id', 'id');
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

    public function entType() {
        return $this->belongsTo('App\EntType', 'ent_type_id', 'id');
    }

    public function fkEntType() {
        return $this->hasMany('App\Property', 'fk_ent_type_id', 'id');
    }

    public function properties() {
        return $this->hasMany('App\Property', 'ent_type_id', 'id');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'ent_type_name', 'ent_type_id', 'language_id')->withPivot('name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }
}
