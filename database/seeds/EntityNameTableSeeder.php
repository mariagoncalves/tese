<?php

use Illuminate\Database\Seeder;
use App\EntityName;

class EntityNameTableSeeder extends Seeder
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
        		'entity_id'   => '1',
        		'language_id' => '1',
        		'name'        => 'Inst Ent1',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	],
        	[	'entity_id'   => '2',
        		'language_id' => '1',
        		'name'        => 'Inst Ent1',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	],
        	[
        		'entity_id'   => '3',
        		'language_id' => '1',
        		'name'        => 'Inst Ent1',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	]
        ];

        foreach ($dados as $value) {
            EntityName::create($value);
        }
    }
}
