<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Lookup Tables
        $this->call(CourseFormatsTableSeeder::class);
        $this->call(CourseCategorysTableSeeder::class);
        $this->call(QuestionTypesTableSeeder::class);
        $this->call(QuizTypesTableSeeder::class);
        
        
        // Users and Roles
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        
        
        // Seeders for testing data... remove at some point
        $this->call(LaraMooTestDataTableSeeder::class);
        
        Model::reguard();
    }
}
