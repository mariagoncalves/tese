<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
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
        		'id'         => '1'
        	],
        	[
        		'id'         => '2'
        	],
        	[
        		'id'         => '3'
        	]
        ];

        foreach ($dados as $value) {
            Role::create($value);
        }
    }
}
