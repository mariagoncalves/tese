<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValueName extends Model
{
    protected $table = 'value_name';

    public $timestamps = true;

    protected $fillable = [
        'value_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function value() {

        return $this->hasOne('App\Value', 'id', 'value_id');
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
