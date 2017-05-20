<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropAllowedValue extends Model
{
    protected $table = 'prop_allowed_value';

    public $timestamps = false;

    protected $fillable = [
        'property_id',
        'value',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
