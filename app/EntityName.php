<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntityName extends Model
{
    protected $table = 'entity_name';

    public $timestamps = true;

    protected $fillable = [
        'entity_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function entity() {

        return $this->hasOne('App\Entity', 'id', 'entity_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
