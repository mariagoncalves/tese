<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageTableSeeder::class);
        $this->call(PropUnitTypeTableSeeder::class);
        $this->call(PropUnitTypeNameTableSeeder::class);
        $this->call(ProcessTypeTableSeeder::class);
        $this->call(ProcessTypeNameTableSeeder::class);
        $this->call(CustomFormTableSeeder::class);
        $this->call(CustomFormNameTableSeeder::class);
        $this->call(AgentTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ActorTableSeeder::class);
        $this->call(RoleHasAgentTableSeeder::class);
        $this->call(RoleHasActorTableSeeder::class);
        $this->call(RoleNameTableSeeder::class);
        $this->call(ActorNameTableSeeder::class);
        



    }
}
