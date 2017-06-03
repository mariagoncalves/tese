<?php

use Illuminate\Database\Seeder;
use App\TransactionType;

class TransactionTypeTableSeeder extends Seeder
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
        		'id'              => '1',
        		'state'           => 'active',
        		'process_type_id' => '1',
        		'executer'        => '1'
        	],
        	[
        		'id'              => '2',
        		'state'           => 'active',
        		'process_type_id' => '2',
        		'executer'        => '2'
        	],
        	[
        		'id'              => '3',
        		'state'           => 'active',
        		'process_type_id' => '3',
        		'executer'        => '3'
        	]
        ];

        foreach ($dados as $value) {
            TransactionType::create($value);
        }
    }
}
