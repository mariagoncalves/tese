<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFormHasProp extends Model
{
    protected $table = 'custom_form_has_prop';

    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'custom_form_id',
        'field_order',
        'mandatory_form',
        'updated_on'
    ];

    protected $guarded = [];
}
