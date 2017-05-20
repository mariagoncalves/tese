<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $table = 'transaction_type';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on',
        'process_type_id',
        'result_type',
        'executer'
    ];

    protected $guarded = [];
}
