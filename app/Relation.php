<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relation';

    public $timestamps = true;

    protected $fillable = [
        'rel_type_id',
        'entity1_id',
        'entity2_id',
        'state'
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

    public function values() {
        return $this->hasMany('App\Value', 'relation_id', 'id');
    }

    public function relationNames() {
        return $this->hasMany('App\RelationName', 'relation_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
