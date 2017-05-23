<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entity';

    public $timestamps = false;

    protected $fillable = [
        'ent_type_id',
        'entity_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];

    public function entType() {
        return $this->hasOne('App\EntType', 'id', 'ent_type_id');
    }

    public function values() {
        return $this->hasMany('App\Value', 'entity_id', 'id');
    }

    public function ent1Relations() {
        return $this->hasMany('App\Relation', 'entity1_id', 'id');
    }

    public function ent2Relations() {
        return $this->hasMany('App\Relation', 'entity2_id', 'id');
    }

}
