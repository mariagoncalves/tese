<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = 'value';

    public $timestamps = false;

    protected $fillable = [
        'entity_id',
        'property_id',
        'value',
        'id_producer',
        'relation_id',
        'updated_on',
        'state'
    ];

    protected $guarded = [];

    public function property() {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }

     public function entity() {
        return $this->hasOne('App\Entity', 'id', 'entity_id');
    }

     public function relation() {
        return $this->hasOne('App\Relation', 'id', 'relation_id');
    }
}
