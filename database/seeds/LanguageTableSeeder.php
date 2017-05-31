<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language')->insert([
        	[
        		'id'   => '1',
        		'name' => 'Português',
        		'slug' => 'pt'
        	],
        	[
        		'id'   => '2',
        		'name' => 'Inglês',
        		'slug' => 'en'
        	]
        ]);
    }

}
