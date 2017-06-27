<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropUnitType extends Model
{
    /*protected $table = 'prop_unit_type';

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
    }*/

    protected $table = 'prop_unit_type';

    public $timestamps = true;

    protected $fillable = [
        'state',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function properties() {
        return $this->hasMany('App\Property', 'unit_type_id', 'id');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'prop_unit_type_name', 'prop_unit_type_id', 'language_id')->withPivot('name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }

    //ADD BY ME

    public function unitsNames() {
        return $this->hasMany('App\PropUnitTypeName', 'prop_unit_type_id', 'id');
    }

}
