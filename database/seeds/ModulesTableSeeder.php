<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Module::create(['course_id' => \App\Course::first()->id, 'name' => 'Test Module', 'description' => 'lorem ipsum']);
    }
}
