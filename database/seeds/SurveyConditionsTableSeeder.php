<?php

use Illuminate\Database\Seeder;

class SurveyConditionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('survey_conditions')->delete();
        
        \DB::table('survey_conditions')->insert(array (
            0 => 
            array (
                'id' => 27,
                'question_id' => 32,
                'answer' => '0',
                'condition' => 'l',
                'jump' => '3',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            1 => 
            array (
                'id' => 28,
                'question_id' => 32,
                'answer' => '2',
                'condition' => 'l',
                'jump' => '2',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            2 => 
            array (
                'id' => 29,
                'question_id' => 32,
                'answer' => '4',
                'condition' => 'l',
                'jump' => 'e',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            3 => 
            array (
                'id' => 30,
                'question_id' => 33,
                'answer' => '0',
                'condition' => 'l',
                'jump' => 's',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            4 => 
            array (
                'id' => 31,
                'question_id' => 33,
                'answer' => '1',
                'condition' => 'l',
                'jump' => '1',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            5 => 
            array (
                'id' => 32,
                'question_id' => 33,
                'answer' => '2',
                'condition' => 'l',
                'jump' => 'e',
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            6 => 
            array (
                'id' => 33,
                'question_id' => 34,
                'answer' => '0',
                'condition' => 'l',
                'jump' => 'e',
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            7 => 
            array (
                'id' => 34,
                'question_id' => 35,
                'answer' => '0',
                'condition' => 'l',
                'jump' => '5',
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            8 => 
            array (
                'id' => 35,
                'question_id' => 35,
                'answer' => '0, 1',
                'condition' => 'l',
                'jump' => 'e',
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
        ));
        
        
    }
}