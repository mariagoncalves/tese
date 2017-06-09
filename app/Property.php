<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Property extends Model
{
     protected $table = 'property';

    public $timestamps = true;

    protected $fillable = [
        'ent_type_id',
        'rel_type_id',
        'value_type',
        'form_field_type',
        'unit_type_id',
        'form_field_order',
        'mandatory',
        'state',
        'fk_ent_type_id',
        'form_field_size'
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

    public function propertiesNames() {
        return $this->hasMany('App\PropertyName', 'property_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }

    //$name é o nome do campo do qual quero obter os valores enum
    public static function getValoresEnum($name){
        $type = DB::select(DB::raw('SHOW COLUMNS FROM property WHERE Field = "'.$name.'"'))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }


}
