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
        'form_field_size',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function entType() {
        return $this->belongsTo('App\EntType', 'ent_type_id', 'id');
    }

    public function fkEntType() {
        return $this->belongsTo('App\EntType', 'fk_ent_type_id', 'id');
    }

    public function customForms() {
        return $this->belongsToMany('App\CustomForm', 'custom_form_has_prop');
    }

    public function relType() {
        return $this->belongsTo('App\EntType', 'rel_type_id', 'id');
    }

    public function values() {
        return $this->hasMany('App\Value', 'property_id', 'id');
    }

    public function units() {
        return $this->belongsTo('App\PropUnitType', 'unit_type_id', 'id');
    }

    public function propAllowedValues() {
        return $this->hasMany('App\PropAllowedValue', 'property_id', 'id');
    }

    public function language() {
        return $this->belongsToMany('App\Language', 'property_name', 'property_id', 'language_id')->withPivot('name','form_field_name','created_at','updated_at','deleted_at');
    }

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }

    //Para ir buscar os valores enum de um campo da base de dados
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
