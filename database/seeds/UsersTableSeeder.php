<?php

use Illuminate\Database\Seeder;
use App\Users;

class UsersTableSeeder extends Seeder
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
                'id'        => '1',
        		'name'      => 'Maria',
        		'email'     => 'maria@gmail.com',
        		'password'  => '12345',
        		'user_name' => 'maria'
        	],
        	[	
                'id'        => '2',
                'name'      => 'Jéssica',
        		'email'     => 'jessica@gmail.com',
        		'password'  => '12345',
        		'user_name' => 'jessica'
        	],
        	[	
                'id'        => '3',
                'name'      => 'José',
        		'email'     => 'jose@gmail.com',
        		'password'  => '12345',
        		'user_name' => 'jose'
        	]
        ];

        foreach ($dados as $value) {
            Users::create($value);
        }
    }
}
