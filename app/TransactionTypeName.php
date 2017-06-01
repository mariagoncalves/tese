<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionTypeName extends Model
{
    protected $table = 'transaction_type_name';

    public $timestamps = true;

    protected $fillable = [
        'transaction_type_id',
        'language_id',
        't_name',
        'rt_name'
    ];

    protected $guarded = [];
}
