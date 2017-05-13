<?php

use Illuminate\Database\Seeder;

class CourseCategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       \DB::table('course_categorys')->truncate();
        
       \DB::table('course_categorys')->insert([
          [
            'id' => 1,
            'categoryname' => 'Not Categorized',
            'description' => 'Courses that are not categorized yet',
            'categoryparent' => 0,
            'sortorder' => 1,
            'visible' => 1,
            'created_at' => null,
            'updated_at' => null
         ],
          [
          'id' => 2,
          'categoryname' => 'Miscellaneous',
          'description' => 'Courses that cannot be categorized',
          'categoryparent' => 0,
          'sortorder' => 2,
          'visible' => 1,
          'created_at' => null,
          'updated_at' => null
              
          ]
          
          
       ]);
       
    }
}
