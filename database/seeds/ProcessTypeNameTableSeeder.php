<?php

use Illuminate\Database\Seeder;
use App\ProcessTypeName;

class ProcessTypeNameTableSeeder extends Seeder
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
        		'process_type_id' => '1',
        		'language_id'     => '1',
        		'name'            => 'Gestão de transportes'
        	],
        	[	'process_type_id' => '2',
        		'language_id'     => '1',
        		'name'            => 'Gestão de apoios'
        	],
        	[
        		'process_type_id' => '3',
        		'language_id'     => '1',
        		'name'            => 'Gestão de concursos'
        	]
        ];

        foreach ($dados as $value) {
            ProcessTypeName::create($value);
        }
    }
}
