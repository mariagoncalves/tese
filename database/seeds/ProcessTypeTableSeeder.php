<?php

use Illuminate\Database\Seeder;
use App\ProcessType;

class ProcessTypeTableSeeder extends Seeder
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
        		'id'         => '1',
        		'state'      => 'active'
        	],
        	[
        		'id'         => '2',
        		'state'      => 'inactive'
        	],
        	[
        		'id'         => '3',
        		'state'      => 'active'
        	]
        ];

        foreach ($dados as $value) {
            ProcessType::create($value);
        }
    }
}
