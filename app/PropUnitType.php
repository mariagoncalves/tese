<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropUnitType extends Model
{
    protected $table = 'prop_unit_type';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];

    public function properties() {
        return $this->hasMany('App\Property', 'unit_type_id', 'id');
    }
}
