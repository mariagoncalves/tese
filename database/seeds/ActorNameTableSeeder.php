<?php

use Illuminate\Database\Seeder;
use App\ActorName;

class ActorNameTableSeeder extends Seeder
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
        		'actor_id'    => '1',
        		'language_id' => '1',
        		'name'        => 'Decisor sobre cedencia de transporte'
        	],
        	[
        		'actor_id'    => '2',
        		'language_id' => '1',
        		'name'        => 'Decisor sobre cedencia de apoios'
        	],
        	[	'actor_id'    => '3',
        		'language_id' => '1',
        		'name'        => 'Requerente de transporte'
        	]
        ];

        foreach ($dados as $value) {
            ActorName::create($value);
        }
    }
}
