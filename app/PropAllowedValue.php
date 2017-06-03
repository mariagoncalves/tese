<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropAllowedValue extends Model
{
    protected $table = 'prop_allowed_value';

    public $timestamps = true;

    protected $fillable = [
        'property_id',
        'state',
        'updated_on'
    ];

    protected $guarded = [];

    public function property() {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }

    public function propAllowedValueNames() {
        return $this->hasMany('App\PropAllowedValueName', 'prop_allowed_value_id', 'id');
    }
}
