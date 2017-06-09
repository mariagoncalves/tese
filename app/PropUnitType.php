<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropUnitType extends Model
{
    protected $table = 'prop_unit_type';

    public $timestamps = true;

    protected $fillable = [
        'state'
    ];

    protected $guarded = [];

    public function properties() {
        return $this->hasMany('App\Property', 'unit_type_id', 'id');
    }

    public function unitsNames() {
        return $this->hasMany('App\PropUnitTypeName', 'prop_unit_type_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }

}
