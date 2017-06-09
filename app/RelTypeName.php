<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelTypeName extends Model
{
    protected $table = 'rel_type_name';

    public $timestamps = true;

    protected $fillable = [
        'rel_type_id',
        'language_id',
        'name'
    ];

    protected $guarded = [];

    public function relType() {

        return $this->hasOne('App\RelType', 'id', 'rel_type_id');
    }

    public function language() {

        return $this->hasOne('App\Language', 'id', 'language_id');
    }

    public function updatedBy() {

        return $this->hasOne('App\Users', 'id', 'updated_by');
    }

    public function deletedBy() {

        return $this->hasOne('App\Users', 'id', 'deleted_by');
    }
}
