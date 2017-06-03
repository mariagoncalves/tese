<?php

use Illuminate\Database\Seeder;
use App\TState;

class TSateTableSeeder extends Seeder
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
        		'id'         => '1'
        	],
        	[
        		'id'         => '2'
        	],
        	[
        		'id'         => '3'
        	],
        	[
        		'id'         => '4'
        	],
        	[
        		'id'         => '5'
        	]
        ];

        foreach ($dados as $value) {
            TState::create($value);
        }
    }
}
