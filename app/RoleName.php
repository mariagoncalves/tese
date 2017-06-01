<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleName extends Model
{
    protected $table = 'role_name';

    public $timestamps = true;

    protected $fillable = [
        'role_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
