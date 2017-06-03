<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public $timestamps = true;

    protected $fillable = [];

    protected $guarded = [];

    public function agent() {

    	return $this->belongsToMany('App\Agent', 'role_has_agent');
    }
    
    public function actor() {

    	return $this->belongsToMany('App\Actor', 'role_has_actor');
    }

    public function roleNames() {
        return $this->hasMany('App\RoleName', 'role_id', 'id');
    }
}
