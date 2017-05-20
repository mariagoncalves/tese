<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    public $timestamps = false;

    protected $fillable = [
        'transaction_type_id',
        'transaction_name',
        'state',
        'updated_on',
        'process_id'
    ];

    protected $guarded = [];
}
