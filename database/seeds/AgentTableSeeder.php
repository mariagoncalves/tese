<?php

use Illuminate\Database\Seeder;
use App\Agent;

class AgentTableSeeder extends Seeder
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
        		'id'        => '1',
        		'user_name' => 'maria',
        		'user_id'   => '1'
        	],
        	[
        		'id'        => '2',
        		'user_name' => 'jess',
        		'user_id'   => '2'
        	],
        	[
        		'id'        => '3',
        		'user_name' => 'jose',
        		'user_id'   => '3'
        	]
        ];

        foreach ($dados as $value) {
            Agent::create($value);
        }
    }
}
