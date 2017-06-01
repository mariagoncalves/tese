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
}
