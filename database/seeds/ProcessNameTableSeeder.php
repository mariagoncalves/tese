<?php

use Illuminate\Database\Seeder;
use App\ProcessName;

class ProcessNameTableSeeder extends Seeder
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
        		'process_id'  => '1',
        		'language_id' => '1',
        		'name'        => 'Gestão de transportes 1 a ocorrer',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	],
        	[	'process_id'  => '2',
        		'language_id' => '1',
        		'name'        => 'Gestão de transportes 2 a ocorrer',
                'updated_by'  => '1',
                'deleted_by'  => '1'
            ],
        	[
        		'process_id'  => '3',
        		'language_id' => '1',
        		'name'        => 'Gestão de transportes 3 a ocorrer',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	]
        ];

        foreach ($dados as $value) {
            ProcessName::create($value);
        }
    }
}
