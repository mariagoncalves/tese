<?php

use Illuminate\Database\Seeder;
use App\CustomFormName;

class CustomFormNameTableSeeder extends Seeder
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
        		'custom_form_id' => '1',
        		'language_id'    => '1',
        		'name'           => 'Formulário de Cedência de Transporte'
        	],
        	[
        		'custom_form_id' => '2',
        		'language_id'    => '1',
        		'name'           => 'Formulário de Apoios'
        	],
        	[
        		'custom_form_id' => '3',
        		'language_id'    => '1',
        		'name'           => 'Formulário de Concursos'
        	]
        ];

        foreach ($dados as $value) {
            CustomFormName::create($value);
        }
    }
}
