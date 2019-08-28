<?php

use Illuminate\Database\Seeder;

class MenuFrontendsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_frontends')->delete();
        
        \DB::table('menu_frontends')->insert(array (
            0 => 
            array (
                'id' => 2,
                'nama_menu' => 'Tentang Kami',
                'nama_menu_eng' => NULL,
                'parrent' => 0,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 4,
                'created_at' => '2019-04-09 02:19:26',
                'updated_at' => '2019-04-11 04:48:59',
                'nama_link' => NULL,
            ),
            1 => 
            array (
                'id' => 5,
                'nama_menu' => 'contact',
                'nama_menu_eng' => NULL,
                'parrent' => 0,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 6,
                'created_at' => '2019-04-09 03:55:04',
                'updated_at' => '2019-04-11 04:48:40',
                'nama_link' => NULL,
            ),
            2 => 
            array (
                'id' => 9,
                'nama_menu' => 'Beranda',
                'nama_menu_eng' => NULL,
                'parrent' => 0,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 1,
                'created_at' => '2019-04-10 04:45:29',
                'updated_at' => '2019-04-10 04:45:29',
                'nama_link' => NULL,
            ),
            3 => 
            array (
                'id' => 10,
                'nama_menu' => 'Media',
                'nama_menu_eng' => NULL,
                'parrent' => 0,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 3,
                'created_at' => '2019-04-10 04:45:55',
                'updated_at' => '2019-04-11 04:49:17',
                'nama_link' => NULL,
            ),
            4 => 
            array (
                'id' => 11,
                'nama_menu' => 'Struktur Organisasi',
                'nama_menu_eng' => NULL,
                'parrent' => 2,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 1,
                'created_at' => '2019-04-10 04:47:42',
                'updated_at' => '2019-04-10 04:47:42',
                'nama_link' => NULL,
            ),
            5 => 
            array (
                'id' => 12,
                'nama_menu' => 'Galeri  Foto',
                'nama_menu_eng' => NULL,
                'parrent' => 10,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 1,
                'created_at' => '2019-04-10 04:48:20',
                'updated_at' => '2019-04-10 04:48:20',
                'nama_link' => NULL,
            ),
            6 => 
            array (
                'id' => 13,
                'nama_menu' => 'Galeri Infografis',
                'nama_menu_eng' => NULL,
                'parrent' => 10,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 2,
                'created_at' => '2019-04-10 04:49:16',
                'updated_at' => '2019-04-10 04:49:16',
                'nama_link' => NULL,
            ),
            7 => 
            array (
                'id' => 14,
                'nama_menu' => 'Sejarah',
                'nama_menu_eng' => NULL,
                'parrent' => 2,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 2,
                'created_at' => '2019-04-10 04:51:10',
                'updated_at' => '2019-04-10 04:51:10',
                'nama_link' => NULL,
            ),
            8 => 
            array (
                'id' => 16,
                'nama_menu' => 'Berita',
                'nama_menu_eng' => NULL,
                'parrent' => 0,
                'link' => NULL,
                'kategori' => NULL,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 2,
                'created_at' => '2019-04-11 04:47:46',
                'updated_at' => '2019-04-11 04:49:37',
                'nama_link' => NULL,
            ),
            9 => 
            array (
                'id' => 17,
                'nama_menu' => 'Berita',
                'nama_menu_eng' => NULL,
                'parrent' => 16,
                'link' => '1',
                'kategori' => 2,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 1,
                'created_at' => '2019-04-11 04:50:11',
                'updated_at' => '2019-04-11 08:07:06',
                'nama_link' => 'Berita Dinas',
            ),
            10 => 
            array (
                'id' => 18,
                'nama_menu' => 'Artikel',
                'nama_menu_eng' => NULL,
                'parrent' => 16,
                'link' => 'http://www.google.com',
                'kategori' => 4,
                'description' => NULL,
                'file' => NULL,
                'urutan' => 2,
                'created_at' => '2019-04-11 04:50:36',
                'updated_at' => '2019-04-11 08:47:20',
                'nama_link' => 'www.google.com',
            ),
        ));
        
        
    }
}