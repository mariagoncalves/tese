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
        'name',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function role() {

        return $this->hasOne('App\Role', 'id', 'role_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
