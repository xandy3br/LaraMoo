<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Services\UserService;


class LaraMooTestDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This should be run last... don't truncate any table unless necessary
        // ONLY PUT TEST DATA THAT SHOULD NOT BE IN THE PACKAGE HERE.
//       \DB::table('course_categorys')->truncate();
        
       // The Admin user should already be there when this in run
        
       $service = app(UserService::class);
       
       if (!User::where('name', 'teacher1')->first()) {
          $user = User::create([
             'name' => 'teacher1',
             'email' => 'teacher1@admin.com',
             'password' => bcrypt('teacher1'),
          ]);
       
          $service->create($user, 'teacher', 'teacher', false);
       }
       
       if (!User::where('name', 'teacher2')->first()) {
          $user = User::create([
             'name' => 'teacher2',
             'email' => 'teacher2@admin.com',
             'password' => bcrypt('teacher2'),
          ]);
       
          $service->create($user, 'teacher', 'teacher', false);
       }
        
       if (!User::where('name', 'student1')->first()) {
          $user = User::create([
             'name' => 'student1',
             'email' => 'student1@admin.com',
             'password' => bcrypt('student1'),
          ]);
           
          $service->create($user, 'member', 'member', false);
       }
        
       if (!User::where('name', 'student2')->first()) {
          $user = User::create([
             'name' => 'student2',
             'email' => 'student2@admin.com',
             'password' => bcrypt('student2'),
          ]);
           
          $service->create($user, 'member', 'member', false);
       }
        
       \DB::table('course_categorys')->where('id', '=', 3)->delete();
       \DB::table('course_categorys')->where('id', '=', 4)->delete();
       \DB::table('course_categorys')->insert([
          [
             'id' => 3,
             'categoryname' => 'Basic Terminology',
             'description' => 'Courses designed to increase the students mastery of financial terminology',
             'categoryparent' => 0,
             'sortorder' => 3,
             'visible' => 1
          ],
          [
          'id' => 4,
          'categoryname' => 'CFA Preparation',
          'description' => 'Courses designed to help a students prepare for CFA exams',
          'categoryparent' => 0,
          'sortorder' => 4,
          'visible' => 1
          ]
          
       ]);
       
       
       
       
       
       
       
       
       
       
    }
}
