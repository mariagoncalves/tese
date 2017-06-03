<?php

use Illuminate\Database\Seeder;
use App\RelTypeName;

class RelTypeNameTableSeeder extends Seeder
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
        		'rel_type_id' => '1',
        		'language_id' => '1',
        		'name'        => 'Relacao 1'
        	],
        	[	'rel_type_id' => '2',
        		'language_id' => '1',
        		'name'        => 'Relacao 2'
        	]
        ];

        foreach ($dados as $value) {
            RelTypeName::create($value);
        }
    }
}
