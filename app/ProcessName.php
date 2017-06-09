<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessName extends Model
{
    protected $table = 'process_name';

    public $timestamps = true;

    protected $fillable = [
        'process_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function process() {

        return $this->hasOne('App\Process', 'id', 'process_id');
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
