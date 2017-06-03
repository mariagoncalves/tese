<?php

use Illuminate\Database\Seeder;
use App\RoleName;

class RoleNameTableSeeder extends Seeder
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
        		'role_id'    => '1',
        		'language_id' => '1',
        		'name'        => 'Administrador'
        	],
        	[
        		'role_id'    => '2',
        		'language_id' => '1',
        		'name'        => 'Administrador'
        	],
        	[	'role_id'    => '3',
        		'language_id' => '1',
        		'name'        => 'Munícipe'
        	]
        ];

        foreach ($dados as $value) {
            RoleName::create($value);
        }
    }
}
