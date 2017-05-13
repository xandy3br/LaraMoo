<?php

use Illuminate\Database\Seeder;

class QuestionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       \DB::table('question_types')->truncate();
        
       \DB::table('question_types')->insert([
          [
            'id' => 1,
            'questiontype' => 'Multiple Choice'
         ],
         [
          'id' => 2,
          'questiontype' => 'True False'
         ],
          [
          'id' => 3,
          'questiontype' => 'Numeric'
             ],
          [
          'id' => 4,
          'questiontype' => 'Calculated'
          ],
         [
          'id' => 5,
          'questiontype' => 'Short Answer'
         ],
          [
          'id' => 6,
          'questiontype' => 'Essay'
           ]
          
          
       ]);
       
    }
}
