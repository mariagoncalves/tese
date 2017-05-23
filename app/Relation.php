<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relation';

    public $timestamps = false;

    protected $fillable = [
        'rel_type_id',
        'entity1_id',
        'entity2_id',
        'relation_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];

    public function entity1() {
        return $this->hasOne('App\Entity', 'id', 'entity1_id');
    }

     public function entity2() {
        return $this->hasOne('App\Entity', 'id', 'entity2_id');
    }

     public function relType() {
        return $this->hasOne('App\RelType', 'id', 'rel_type_id');
    }
}
