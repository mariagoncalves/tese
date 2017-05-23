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

    public function processes() {
        return $this->hasMany('App\Process', 'process_type_id', 'id');
    }

    public function transactionsType() {
        return $this->hasMany('App\TransactionType', 'process_type_id', 'id');
    }
}
