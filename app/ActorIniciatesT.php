<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorIniciatesT extends Model
{
    protected $table = 'actor_iniciates_t';

    public $timestamps = true;

    protected $fillable = [
        'transaction_type_id',
        'actor_id'
    ];

    protected $guarded = [];

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
