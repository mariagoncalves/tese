<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomForm extends Model
{
    protected $table = 'custom_form';

    public $timestamps = true;

    protected $fillable = [
        'state',
    ];

    protected $guarded = [];

    public function properties() {
        return $this->belongsToMany('App\Property', 'custom_form_has_prop');
    }

    public function customFormName() {
        return $this->hasMany('App\CustomFormName', 'custom_form_id', 'id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
