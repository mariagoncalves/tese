<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelTypeName extends Model
{
    protected $table = 'rel_type_name';

    public $timestamps = true;

    protected $fillable = [
        'rel_type_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
