<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyName extends Model
{
    protected $table = 'property_name';

    public $timestamps = true;

    protected $fillable = [
        'property_id',
        'language_id',
        'name',
        'form_field_name'
    ];

    protected $guarded = [];

    public function property() {

        return $this->hasOne('App\Actor', 'id', 'property_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
