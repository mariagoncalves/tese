<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFormName extends Model
{
     protected $table = 'custom_form_name';

    public $timestamps = true;

    protected $fillable = [
        'custom_form_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function customForm() {

        return $this->hasOne('App\CustomForm', 'custom_form_id', 'id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
