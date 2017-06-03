<?php

use Illuminate\Database\Seeder;
use App\RoleHasAgent;

class RoleHasAgentTableSeeder extends Seeder
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
        		'role_id'  => '1',
        		'agent_id' => '1'
        	],
        	[
        		'role_id'  => '2',
        		'agent_id' => '2'
        	],
        	[
        		'role_id'  => '3',
        		'agent_id' => '3'
        	]
        ];

        foreach ($dados as $value) {
            RoleHasAgent::create($value);
        }
    }
}
