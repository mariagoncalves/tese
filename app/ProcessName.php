<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessName extends Model
{
    protected $table = 'process_name';

    public $timestamps = true;

    protected $fillable = [
        'process_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
