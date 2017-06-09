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
        		'name'              => 'cm',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	],
        	[
        		'prop_unit_type_id' => '1',
        		'language_id'       => '2',
        		'name'              => 'cm',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	],
        	[
        		'prop_unit_type_id' => '2',
        		'language_id'       => '1',
        		'name'              => 'kg',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	],
        	[
        		'prop_unit_type_id' => '2',
        		'language_id'       => '2',
        		'name'              => 'kg',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	],
        	[
        		'prop_unit_type_id' => '3',
        		'language_id'       => '1',
        		'name'              => 'mm',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	],
        	[
        		'prop_unit_type_id' => '3',
        		'language_id'       => '2',
        		'name'              => 'mm',
                'updated_by'        => '1',
                'deleted_by'        => '1'
        	]
        ]);
    }
}
