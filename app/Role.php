<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    public $timestamps = true;

    protected $fillable = [
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function user() {

        return $this->belongsToMany('App\Users', 'role_has_agent');
    }
    
    public function actor() {

        return $this->belongsToMany('App\Actor', 'role_has_actor');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'role_name', 'role_id', 'language_id')->withPivot('name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }
}
