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
                'id' => 47,
                'survey_id' => 1,
                'urutan' => 1,
                'pertanyaan' => 'Usia anda saat ini :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 1,
                'created_at' => '2019-09-23 08:43:50',
                'updated_at' => '2019-09-23 08:43:50',
            ),
            1 => 
            array (
                'id' => 48,
                'survey_id' => 1,
                'urutan' => 2,
                'pertanyaan' => 'Pekerjaan :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-23 08:43:50',
                'updated_at' => '2019-09-23 08:43:50',
            ),
            2 => 
            array (
                'id' => 49,
                'survey_id' => 1,
                'urutan' => 3,
                'pertanyaan' => 'Pendapatan perbulan :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-23 08:43:51',
                'updated_at' => '2019-09-23 08:43:51',
            ),
            3 => 
            array (
                'id' => 50,
                'survey_id' => 1,
                'urutan' => 4,
            'pertanyaan' => 'Alasan mengikuti mudik gratis (bisa menjawab lebih dari 1) :',
                'tipe_pertanyaan' => 'checkbox',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-23 08:43:51',
                'updated_at' => '2019-09-23 08:43:51',
            ),
            4 => 
            array (
                'id' => 51,
                'survey_id' => 1,
                'urutan' => 5,
                'pertanyaan' => 'Apakah saudara mengikut sertakan sepeda motor dalam mudik gratis :',
                'tipe_pertanyaan' => 'radiogroup',
                'tipe_text' => NULL,
                'has_other' => 0,
                'created_at' => '2019-09-23 08:43:52',
                'updated_at' => '2019-09-23 08:43:52',
            ),
            5 => 
            array (
                'id' => 52,
                'survey_id' => 1,
                'urutan' => 6,
                'pertanyaan' => 'Masukan untuk program mudik gratis :',
                'tipe_pertanyaan' => 'text',
                'tipe_text' => 'text',
                'has_other' => 0,
                'created_at' => '2019-09-23 08:43:52',
                'updated_at' => '2019-09-23 08:43:52',
            ),
        ));
        
        
    }
}