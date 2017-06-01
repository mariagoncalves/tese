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
}
