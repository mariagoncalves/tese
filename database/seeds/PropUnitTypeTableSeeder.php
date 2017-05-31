<?php

use Illuminate\Database\Seeder;

class PropUnitTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prop_unit_type')->insert([
        	[
        		'id'         => '1',
        		'state'      => 'active',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	],
        	[
        		'id'         => '2',
        		'state'      => 'inactive',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	],
        	[
        		'id'         => '3',
        		'state'      => 'active',
        		'created_at' => date('Y-m-d H:i:s'),
        		'updated_at' => date('Y-m-d H:i:s')
        	]

        ]);
    }
}
