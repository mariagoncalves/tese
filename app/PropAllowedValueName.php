<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropAllowedValueName extends Model
{
    protected $table = 'prop_allowed_value_name';

    public $timestamps = true;

    protected $fillable = [
        'prop_allowed_value_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
