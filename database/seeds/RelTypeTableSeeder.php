<?php

use Illuminate\Database\Seeder;
use App\RelType;

class RelTypeTableSeeder extends Seeder
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
        		'ent_type1_id'        => '1',
        		'ent_type2_id'        => '2',
        		'state'               =>  'active',
        		'transaction_type_id' => '1'
        	],
        	[	'id'                  => '2',
        		'ent_type1_id'        => '1',
        		'ent_type2_id'        => '3',
        		'state'               =>  'active',
        		'transaction_type_id' => '2'
        	]
        ];

        foreach ($dados as $value) {
            RelType::create($value);
        }
    }
}
