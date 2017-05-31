<?php

use Illuminate\Database\Seeder;

class PropUnitTypeNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prop_unit_type_name')->insert([
        	[
        		'prop_unit_type_id' => '1',
        		'language_id'       => '1',
        		'name'              => 'cm'
        	],
        	[
        		'prop_unit_type_id' => '1',
        		'language_id'       => '2',
        		'name'              => 'cm'
        	],
        	[
        		'prop_unit_type_id' => '2',
        		'language_id'       => '1',
        		'name'              => 'kg'
        	],
        	[
        		'prop_unit_type_id' => '2',
        		'language_id'       => '2',
        		'name'              => 'kg'
        	],
        	[
        		'prop_unit_type_id' => '3',
        		'language_id'       => '1',
        		'name'              => 'mm'
        	],
        	[
        		'prop_unit_type_id' => '3',
        		'language_id'       => '2',
        		'name'              => 'mm'
        	]
        ]);
    }
}
