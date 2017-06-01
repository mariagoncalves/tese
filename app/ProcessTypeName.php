<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessTypeName extends Model
{
    protected $table = 'process_type_name';

    public $timestamps = true;

    protected $fillable = [
        'process_type_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];
}
