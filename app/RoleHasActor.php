<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasActor extends Model
{
    protected $table = 'role_has_actor';

    public $timestamps = true;

    protected $fillable = [
        'role_id',
        'actor_id'
    ];

    protected $guarded = [];

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
