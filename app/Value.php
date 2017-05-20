<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $table = 'value';

    public $timestamps = false;

    protected $fillable = [
        'entity_id',
        'property_id',
        'value',
        'id_producer',
        'relation_id',
        'updated_on',
        'state'
    ];

    protected $guarded = [];
}
