<?php

use Illuminate\Database\Seeder;
use App\RoleHasActor;

class RoleHasActorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
        	[
        		'actor_id' => '1',
        		'role_id'  => '1'
        	],
        	[
        		'actor_id' => '2',
        		'role_id'  => '2'
        	],
        	[
        		'actor_id' => '3',
        		'role_id'  => '3'
        	]
        ];

        foreach ($dados as $value) {
            RoleHasActor::create($value);
        }
    }
}
