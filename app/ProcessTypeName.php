<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessTypeName extends Model
{
    protected $table = 'process_type_name';

    public $timestamps = true;

    protected $fillable = [
        'process_type_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function processType() {

        return $this->hasOne('App\ProcessType', 'id', 'process_type_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
