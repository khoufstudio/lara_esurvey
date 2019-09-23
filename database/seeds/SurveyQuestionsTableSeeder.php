<?php

use Illuminate\Database\Seeder;

class SurveyQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('survey_questions')->delete();
        
        \DB::table('survey_questions')->insert(array (
            0 => 
            array (
                'id' => 32,
                'survey_id' => 1,
                'urutan' => 1,
                'pertanyaan' => 'Usia anda saat ini :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 1,
                'created_at' => '2019-09-20 09:17:21',
                'updated_at' => '2019-09-20 09:17:21',
            ),
            1 => 
            array (
                'id' => 33,
                'survey_id' => 1,
                'urutan' => 2,
                'pertanyaan' => 'Pekerjaan :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            2 => 
            array (
                'id' => 34,
                'survey_id' => 1,
                'urutan' => 3,
                'pertanyaan' => 'Pendapatan perbulan :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            3 => 
            array (
                'id' => 35,
                'survey_id' => 1,
                'urutan' => 4,
            'pertanyaan' => 'Alasan mengikuti mudik gratis (bisa menjawab lebih dari 1) :',
                'tipe_pertanyaan' => 'checkbox',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            4 => 
            array (
                'id' => 36,
                'survey_id' => 1,
                'urutan' => 5,
                'pertanyaan' => 'Apakah saudara mengikut sertakan sepeda motor dalam mudik gratis :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
        ));
        
        
    }
}