<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationName extends Model
{
    protected $table = 'relation_name';

    public $timestamps = true;

    protected $fillable = [
        'relation_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function relation() {

        return $this->hasOne('App\Relation', 'id', 'relation_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
