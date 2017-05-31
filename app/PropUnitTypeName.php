<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropUnitTypeName extends Model
{
    protected $table = 'prop_unit_type_name';

    public $timestamps = false;

    protected $fillable = [
        'prop_unit_type_id',
        'language',
        'name'
    ];

    protected $guarded = [];
}
