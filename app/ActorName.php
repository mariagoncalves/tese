<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorName extends Model
{
    protected $table = 'actor_name';

    public $timestamps = true;

    protected $fillable = [
        'actor_id',
        'language_id',
        'name',
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
