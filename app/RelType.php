<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelType extends Model
{
    protected $table = 'rel_type';

    public $timestamps = true;

    protected $fillable = [
        'ent_type1_id',
        'ent_type2_id',
        'state',
        'updated_on',
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

    //Relação antiga - a apagar
    public function relTypeNames() {
        return $this->hasMany('App\RelTypeName', 'rel_type_id', 'id');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'rel_type_name', 'rel_type_id', 'language_id')->withPivot('name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }

    //Novas relações a usar
    /*protected $table = 'rel_type';

    public $timestamps = true;

    protected $fillable = [
        'ent_type1_id',
        'ent_type2_id',
        'state',
        'transaction_type_id',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function transactionsType() {
        return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id');
    }

    public function relations() {
        return $this->hasMany('App\Relation', 'rel_type_id', 'id');
    }

    public function properties() {
        return $this->hasMany('App\Property', 'rel_type_id', 'id');
    }

    public function ent1() {
        return $this->belongsTo('App\EntType', 'ent_type1_id', 'id');
    }

    public function ent2() {
        return $this->belongsTo('App\EntType', 'ent_type2_id', 'id');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'rel_type_name', 'rel_type_id', 'language_id')->withPivot('name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }*/
}
