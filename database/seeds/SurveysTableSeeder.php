<?php

use Illuminate\Database\Seeder;

class SurveysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('surveys')->delete();
        
        \DB::table('surveys')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Persepsi Penumpang Terhadap MUDIK GRATIS Angkutan Bus DKI Jakarta',
                'deskripsi' => 'Berkaitan dengan pelaksanaan MUDIK GRATIS angkutan lebaran 2019, Dinas Perhubungan DKI Jakarta sedang melakukan survei mengenai persepsi penumpang terhadap pelaksanaan MUDIK GRATIS dengan angkutan bus. Mohon bantuan Bapak/Ibu/Saudara/i untuk mengisi kuesioner berikut. Atas bantuan, partisipasi serta kerjasamanya, kami ucapkan terima kasih.',
                'status' => 0,
                'user_id' => 1,
                'created_at' => '2019-09-17 07:51:33',
                'updated_at' => '2019-09-20 03:34:26',
            ),
        ));
        
        
    }
}