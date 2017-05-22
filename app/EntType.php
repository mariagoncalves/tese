<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntType extends Model
{
    protected $table = 'ent_type';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'state',
        'updated_on',
        'transaction_type_id',
        'ent_type_id'
    ];

    protected $guarded = [];

    public function transactionsType() {
        return $this->belongsTo('App\TransactionType', 'id');
    }
}
