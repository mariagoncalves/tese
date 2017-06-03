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
        'name'
    ];

    protected $guarded = [];

    public function actor() {

        return $this->hasOne('App\Actor', 'id', 'actor_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }
}
