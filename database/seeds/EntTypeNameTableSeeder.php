<?php

use Illuminate\Database\Seeder;
use App\EntTypeName;

class EntTypeNameTableSeeder extends Seeder
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
        		'ent_type_id' => '1',
        		'language_id' => '1',
        		'name'        => 'Transporte'
        	],
        	[	'ent_type_id' => '2',
        		'language_id' => '1',
        		'name'        => 'Apoios'
        	],
        	[
        		'ent_type_id' => '3',
        		'language_id' => '1',
        		'name'        => 'Concurso'
        	]
        ];

        foreach ($dados as $value) {
            EntTypeName::create($value);
        }
    }
}
