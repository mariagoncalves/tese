<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationName extends Model
{
    protected $table = 'relation_name';

    public $timestamps = true;

    protected $fillable = [
        'relation_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
