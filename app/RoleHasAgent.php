<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasAgent extends Model
{
    protected $table = 'role_has_agent';

    public $timestamps = true;

    protected $fillable = [
        'role_id',
        'agent_id'
    ];

    protected $guarded = [];
}
