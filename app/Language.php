<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'slug'
    ];
}
