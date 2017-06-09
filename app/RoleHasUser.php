<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasUser extends Model
{
    protected $table = 'role_has_user';

    public $timestamps = true;

    protected $fillable = [
        'role_id',
        'user_id',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
