<?php

use Illuminate\Database\Seeder;
use App\Actor;

class ActorTableSeeder extends Seeder
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
        		'id'         => '1',
                'updated_by' => '1',
                'deleted_by' => '1'
        	],
        	[
        		'id'         => '2',
                'updated_by' => '1',
                'deleted_by' => '1'
        	],
        	[
        		'id'         => '3',
                'updated_by' => '1',
                'deleted_by' => '1'
        	]
        ];

        foreach ($dados as $value) {
            Actor::create($value);
        }
    }
}
