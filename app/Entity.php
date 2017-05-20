<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entity';

    public $timestamps = false;

    protected $fillable = [
        'ent_type_id',
        'entity_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
