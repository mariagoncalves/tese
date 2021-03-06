<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorIniciatesT extends Model
{
    protected $table = 'actor_iniciates_t';

    public $timestamps = true;

    protected $fillable = [
        'transaction_type_id',
        'actor_id',
        'updated_by',
        'deleted_by'
    ];

    protected $guarded = [];

    public function updatedBy() {

        return $this->belongsTo('App\Users', 'updated_by', 'id');
    }

    public function deletedBy() {

        return $this->belongsTo('App\Users', 'deleted_by', 'id');
    }
}
