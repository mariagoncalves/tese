<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $table = 'process';

    public $timestamps = false;

    protected $fillable = [
        'process_type_id',
        'process_name',
        'state',
        'updated_on'
    ];

    protected $guarded = [];
}
