<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelType extends Model
{
    protected $table = 'rel_type';

    public $timestamps = false;

    protected $fillable = [
        'ent_type1_id',
        'ent_type2_id',
        'state',
        'updated_on',
        'name',
        'transaction_type_id'
    ];

    protected $guarded = [];
}
