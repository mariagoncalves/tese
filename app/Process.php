<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
     protected $table = 'process';

    public $timestamps = true;

    protected $fillable = [
        'process_type_id',
        'state'
    ];

    protected $guarded = [];

    public function processType() {
        return $this->hasOne('App\ProcessType', 'id', 'process_type_id');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction', 'process_id', 'id');
    }

    public function processNames() {
        return $this->hasMany('App\ProcessName', 'process_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
