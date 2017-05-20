<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessType extends Model
{
    protected $table = 'process_type';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
