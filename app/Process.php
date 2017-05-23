<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process';

    public $timestamps = false;

    protected $fillable = [
        'process_type_id',
        'process_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];

    public function processType() {
        return $this->hasOne('App\ProcessType', 'id', 'process_type_id');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction', 'process_id', 'id');
    }
}
