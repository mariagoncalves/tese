<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFormHasProp extends Model
{
    protected $table = 'custom_form_has_prop';

    public $timestamps = true;

    protected $fillable = [
        'property_id',
        'custom_form_id',
        'field_order',
        'mandatory_form',
    ];

    protected $guarded = [];

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
