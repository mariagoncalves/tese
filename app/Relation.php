<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $table = 'relation';

    public $timestamps = false;

    protected $fillable = [
        'rel_type_id',
        'entity1_id',
        'entity2_id',
        'relation_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
