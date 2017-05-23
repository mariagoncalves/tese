<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'ent_type_id',
        'rel_type_id',
        'value_type',
        'form_field_name',
        'form_field_type',
        'unit_type_id',
        'form_field_order',
        'mandatory',
        'state',
        'fk_ent_type_id',
        'form_field_size',
        'updated_on'
    ];

    protected $guarded = [];

    public function entType() {
        return $this->hasOne('App\EntType', 'id', 'ent_type_id');
    }

    public function fkEntType() {
        return $this->hasOne('App\EntType', 'id', 'fk_ent_type_id');
    }

    public function customForms() {
        return $this->belongsToMany('App\CustomForm', 'custom_form_has_prop');
    }

    public function relType() {
        return $this->hasOne('App\EntType', 'id', 'rel_type_id');
    }

    public function values() {
        return $this->hasMany('App\Value', 'property_id', 'id');
    }

    public function units() {
        return $this->hasOne('App\PropUnitType', 'id', 'unit_type_id');
    }

    public function propAllowedValues() {
        return $this->hasMany('App\PropAllowedValue', 'property_id', 'id');
    }


}
