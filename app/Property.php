<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'ent_type_id',
        'rel_type_id',
        'value_type',
        'form_field_name',
        'form_field_type',
        'unit_type_id',
        'form_field_order',
        'mandatory',
        'state',
        'fk_ent_type_id',
        'form_field_size',
        'updated_on'
    ];

    protected $guarded = [];
}
