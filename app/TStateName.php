<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TStateName extends Model
{
    protected $table = 't_state_name';

    public $timestamps = true;

    protected $fillable = [
        't_state_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function tState() {

        return $this->hasOne('App\TState', 'id', 't_state_id');
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
