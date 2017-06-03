<?php

use Illuminate\Database\Seeder;
use App\TStateName;

class TSateNameTableSeeder extends Seeder
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
        		't_state_id'  => '1',
        		'language_id' => '1',
        		'name'        => 'Request'
        	],
        	[
        		't_state_id'  => '2',
        		'language_id' => '1',
        		'name'        => 'Promisse'
        	],
        	[	't_state_id'  => '3',
        		'language_id' => '1',
        		'name'        => 'Execute'
        	],
        	[	't_state_id'  => '4',
        		'language_id' => '1',
        		'name'        => 'State'
        	],
        	[	't_state_id'  => '5',
        		'language_id' => '1',
        		'name'        => 'Accept'
        	]
        ];

        foreach ($dados as $value) {
            TStateName::create($value);
        }
    }
}
