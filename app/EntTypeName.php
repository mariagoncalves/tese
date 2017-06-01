<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntTypeName extends Model
{
    protected $table = 'entity_name';

    public $timestamps = true;

    protected $fillable = [
        'entity_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
