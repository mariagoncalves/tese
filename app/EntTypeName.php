<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntTypeName extends Model
{
    protected $table = 'ent_type_name';

    public $timestamps = true;

    protected $fillable = [
        'entity_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function entType() {

        return $this->hasOne('App\EntType', 'id', 'ent_type_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
