<?php

use Illuminate\Database\Seeder;
use App\Property;

class PropertyTableSeeder extends Seeder
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
        		'id'               => '1',
        		'ent_type_id'      => '1',
        		'rel_type_id'      => NULL,
        		'value_type'       => 'text',
        		'form_field_type'  => 'text',
        		'unit_type_id'     => '1',
        		'form_field_order' => '1',
        		'mandatory'        => '1',
        		'state'            => 'active',
        		'fk_ent_type_id'   => NULL,
        		'form_field_size'  => '50'
        	],
        	[
        		'id'               => '2',
        		'ent_type_id'      => '1',
        		'rel_type_id'      => NULL,
        		'value_type'       => 'text',
        		'form_field_type'  => 'text',
        		'unit_type_id'     => '1',
        		'form_field_order' => '2',
        		'mandatory'        => '1',
        		'state'            => 'active',
        		'fk_ent_type_id'   => NULL,
        		'form_field_size'  => '50'
        	]
        ];

        foreach ($dados as $value) {
            Property::create($value);
        }
    }
}
