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
        		'form_field_name' => 'NomeProp'
        	],
        	[
        		'property_id'     => '2',
        		'language_id'     => '1',
        		'name'            => 'Morada',
        		'form_field_name' => 'MoradaProp'
        	]
        ];

        foreach ($dados as $value) {
            PropertyName::create($value);
        }
    }
}
