<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomForm extends Model
{
     protected $table = 'custom_form';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
