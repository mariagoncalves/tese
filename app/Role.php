<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        protected $table = 'role';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    protected $guarded = [];

    public function agent() {

    	return $this->belongsToMany('App\Agent', 'role_has_agent');
    }
    
    public function actor() {

    	return $this->belongsToMany('App\Actor', 'role_has_actor');
    }
}
