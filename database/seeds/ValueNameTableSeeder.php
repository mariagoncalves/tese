<?php

use Illuminate\Database\Seeder;
use App\ValueName;

class ValueNameTableSeeder extends Seeder
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
        		'value_id'    => '1',
                'language_id' => '1',
                'name'        => 'Maria José',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	],
        	[
        		'value_id'    => '2',
                'language_id' => '1',
                'name'        => 'Machico',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	],
        	[
        		'value_id'    => '3',
                'language_id' => '1',
                'name'        => '9200-162',
                'updated_by'  => '1',
                'deleted_by'  => '1'
        	]
        ];

        foreach ($dados as $value) {
            ValueName::create($value);
        }
    }
}
