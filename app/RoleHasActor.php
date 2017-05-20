<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasActor extends Model
{
    protected $table = 'role_has_actor';

    public $timestamps = false;

    protected $fillable = [
        'role_id',
        'actor_id'
    ];

    protected $guarded = [];
}
