<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropAllowedValueName extends Model
{
    protected $table = 'prop_allowed_value_name';

    public $timestamps = true;

    protected $fillable = [
        'prop_allowed_value_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function propAllowedValue() {

        return $this->hasOne('App\PropAllowedValue', 'id', 'prop_allowed_value_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
