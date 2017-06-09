<?php

use Illuminate\Database\Seeder;
use App\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('language')->insert([
        	[
        		'id'         => '1',
        		'name'       => 'Português',
        		'slug'       => 'pt',
                'updated_by' => '1',
                'deleted_by' => '1'
        	],
        	[
        		'id'   => '2',
        		'name' => 'Inglês',
        		'slug' => 'en',
                'updated_by' => '1',
                'deleted_by' => '1'
        	]
        ]);*/

        $dados = [
            [
                'id'         => '1',
                'name'       => 'Português',
                'slug'       => 'pt',
                'updated_by' => '1',
                'deleted_by' => '1'
            ],
            [   'id'   => '2',
                'name' => 'Inglês',
                'slug' => 'en',
                'updated_by' => '1',
                'deleted_by' => '1'
            ]
        ];

        foreach ($dados as $value) {
            Language::create($value);
        }
    }

}
