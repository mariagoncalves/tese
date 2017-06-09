<?php

use Illuminate\Database\Seeder;
use App\PropertyName;

class PropertyNameTableSeeder extends Seeder
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
        		'property_id'     => '1',
        		'language_id'     => '1',
        		'name'            => 'Nome',
        		'form_field_name' => 'NomeProp',
                'updated_by'      => '1',
                'deleted_by'      => '1'
        	],
        	[
        		'property_id'     => '2',
        		'language_id'     => '1',
        		'name'            => 'Morada',
        		'form_field_name' => 'MoradaProp',
                'updated_by'      => '1',
                'deleted_by'      => '1'
        	],
            [
                'property_id'     => '3',
                'language_id'     => '1',
                'name'            => 'Codigo Postal',
                'form_field_name' => 'CodigoProp',
                'updated_by'      => '1',
                'deleted_by'      => '1'
            ],
             [
                'property_id'     => '4',
                'language_id'     => '1',
                'name'            => 'Idade',
                'form_field_name' => 'IdadeProp',
                'updated_by'      => '1',
                'deleted_by'      => '1'
            ],
            [
                'property_id'     => '5',
                'language_id'     => '1',
                'name'            => 'Interesses',
                'form_field_name' => 'InteressesProp',
                'updated_by'      => '1',
                'deleted_by'      => '1'
            ]

        ];

        foreach ($dados as $value) {
            PropertyName::create($value);
        }
    }
}
