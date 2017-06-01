<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueName extends Model
{
    protected $table = 'value_name';

    public $timestamps = true;

    protected $fillable = [
        'value_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
