<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Course::create(['name' => 'Test Course',  'description' => 'Test desc', 'content' => 'ipsum', 'duration' => 120, 'price' => 0.01]);
    }
}
