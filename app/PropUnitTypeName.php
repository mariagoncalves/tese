<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropUnitTypeName extends Model
{
    protected $table = 'prop_unit_type_name';

    public $timestamps = true;

    protected $fillable = [
        'prop_unit_type_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function unitType() {

    	return $this->hasOne('App\PropUnitType', 'id', 'prop_unit_type_id');
    }

    public function unitName() {

    	return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
