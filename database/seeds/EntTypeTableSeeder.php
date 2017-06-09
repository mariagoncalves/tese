<?php

use Illuminate\Database\Seeder;
use App\EntType;

class EntTypeTableSeeder extends Seeder
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
        		'id'                  => '1',
        		'state'               => 'active',
        		'transaction_type_id' => '1',
        		'ent_type_id'         =>  NULL,
        		't_state_id'          => '1',
                'updated_by'          => '1',
                'deleted_by'          => '1'
        	],
        	[	'id'                  => '2',
        		'state'               => 'active',
        		'transaction_type_id' => '2',
        		'ent_type_id'         => NULL,
        		't_state_id'          => '2',
                'updated_by'          => '1',
                'deleted_by'          => '1'
        	],
        	[
        		'id'                  => '3',
        		'state'               => 'active',
        		'transaction_type_id' => '3',
        		'ent_type_id'         => NULL,
        		't_state_id'          => '3',
                'updated_by'          => '1',
                'deleted_by'          => '1'
        	]
        ];

        foreach ($dados as $value) {
            EntType::create($value);
        }
    }
}
