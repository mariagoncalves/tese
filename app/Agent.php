<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agent';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'user_name',
        'password',
        'email'
    ];

    protected $guarded = [];


    //Definir relações entre tabelas da base de dados
    //Um agente pode ter vários papéis e um papel podem ser desempenhados por vários agentes.
    //Por isso, é usado belongsToMany.
    //'role_has_agent' é o nome da tabela que surge quando uma relação é de n->n.
    public function roles() {

    	return $this->belongsToMany('App\Role', 'role_has_agent');
    }

    public function transactionStates() {
        return $this->hasMany('App\TransactionState', 'agent_id', 'id');
    }

    public function transactionAcks() {
        return $this->hasMany('App\TransactionAck', 'agent_id', 'id');
    }





}
