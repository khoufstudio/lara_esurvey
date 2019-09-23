<?php

use Illuminate\Database\Seeder;

class SurveyAnswersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('survey_answers')->delete();
        
        \DB::table('survey_answers')->insert(array (
            0 => 
            array (
                'id' => 123,
                'question_id' => 32,
                'urutan' => 1,
                'jawaban' => '< 20 tahun',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:21',
                'updated_at' => '2019-09-20 09:17:21',
            ),
            1 => 
            array (
                'id' => 124,
                'question_id' => 32,
                'urutan' => 2,
                'jawaban' => '20 - 30 tahun',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:21',
                'updated_at' => '2019-09-20 09:17:21',
            ),
            2 => 
            array (
                'id' => 125,
                'question_id' => 32,
                'urutan' => 3,
                'jawaban' => '31 - 40 tahun',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:21',
                'updated_at' => '2019-09-20 09:17:21',
            ),
            3 => 
            array (
                'id' => 126,
                'question_id' => 32,
                'urutan' => 4,
                'jawaban' => '41 - 50 tahun',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:21',
                'updated_at' => '2019-09-20 09:17:21',
            ),
            4 => 
            array (
                'id' => 127,
                'question_id' => 32,
                'urutan' => 5,
                'jawaban' => '51 - 60 tahun',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            5 => 
            array (
                'id' => 128,
                'question_id' => 33,
                'urutan' => 1,
                'jawaban' => 'Karyawan Swasta/BUMN',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            6 => 
            array (
                'id' => 129,
                'question_id' => 33,
                'urutan' => 2,
                'jawaban' => 'Pedagang',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            7 => 
            array (
                'id' => 130,
                'question_id' => 33,
                'urutan' => 3,
                'jawaban' => 'PNS',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:22',
                'updated_at' => '2019-09-20 09:17:22',
            ),
            8 => 
            array (
                'id' => 131,
                'question_id' => 34,
                'urutan' => 1,
                'jawaban' => '< 1 juta',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            9 => 
            array (
                'id' => 132,
                'question_id' => 34,
                'urutan' => 2,
                'jawaban' => '1-2 juta',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            10 => 
            array (
                'id' => 133,
                'question_id' => 34,
                'urutan' => 3,
                'jawaban' => '2-3 juta',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            11 => 
            array (
                'id' => 134,
                'question_id' => 35,
                'urutan' => 1,
                'jawaban' => 'Murah',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            12 => 
            array (
                'id' => 135,
                'question_id' => 35,
                'urutan' => 2,
                'jawaban' => 'Selamat',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            13 => 
            array (
                'id' => 136,
                'question_id' => 35,
                'urutan' => 3,
                'jawaban' => 'Cepat',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            14 => 
            array (
                'id' => 137,
                'question_id' => 35,
                'urutan' => 4,
                'jawaban' => 'Nyaman',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            15 => 
            array (
                'id' => 138,
                'question_id' => 36,
                'urutan' => 1,
                'jawaban' => 'Ya',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
            16 => 
            array (
                'id' => 139,
                'question_id' => 36,
                'urutan' => 2,
                'jawaban' => 'Tidak',
                'bobot' => 0,
                'created_at' => '2019-09-20 09:17:23',
                'updated_at' => '2019-09-20 09:17:23',
            ),
        ));
        
        
    }
}