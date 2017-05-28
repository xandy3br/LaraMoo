<?php

use Illuminate\Database\Seeder;

class QuizTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       \DB::table('quiz_types')->truncate();
        
       \DB::table('quiz_types')->insert([
          [
            'id' => 1,
            'quiztype' => 'Sealed',
            'description' => 'Quiz can only be taken once and the answers are never visible' 
          ],
          [
            'id' => 2,
             'quiztype' => '',
             'description' => ''
          ],
          [
             'id' => 3,
             'quiztype' => '',
             'description' => ''
          ],
          [
             'id' => 4,
             'quiztype' => '',
             'description' => ''
          ],
          [
             'id' => 5,
             'quiztype' => '',
             'description' => ''
          ],
          [
             'id' => 6,
             'quiztype' => '',
             'description' => ''
          ],
          
          
       ]);
       
    }
}
