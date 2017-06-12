<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'language';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected $guarded = [];

    public function propAllowedValueName() {

    	return $this->hasMany('App\PropAllowedValueName', 'language_id', 'id');
    }

    public function propUnitTypeName() {

    	return $this->hasMany('App\PropUnitTypeName', 'language_id', 'id');
    }

    public function relationName() {

    	return $this->hasMany('App\RelationName', 'language_id', 'id');
    }

    public function valueName() {

    	return $this->hasMany('App\ValueName', 'language_id', 'id');
    }

    public function propertyName() {

    	return $this->hasMany('App\PropertyName', 'language_id', 'id');
    }

    public function entTypeName() {

    	return $this->hasMany('App\EntTypeName', 'language_id', 'id');
    }

    public function actorName() {

    	return $this->hasMany('App\ActorName', 'language_id', 'id');
    }

    public function roleName() {

    	return $this->hasMany('App\RoleName', 'language_id', 'id');
    }

    public function processTypeName() {

    	return $this->hasMany('App\ProcessTypeName', 'language_id', 'id');
    }

    public function processName() {

    	return $this->hasMany('App\ProcessName', 'language_id', 'id');
    }

    public function transactionTypeName() {

    	return $this->hasMany('App\TransactionTypeName', 'language_id', 'id');
    }

    public function tStateName() {

    	return $this->hasMany('App\TStateName', 'language_id', 'id');
    }

    public function entityName() {

    	return $this->hasMany('App\EntityName', 'language_id', 'id');
    }

    public function relTypeName() {

    	return $this->hasMany('App\RelTypeName', 'language_id', 'id');
    }

    public function customFormName() {

    	return $this->hasMany('App\CustomFormName', 'language_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
