<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_menu' => 'Setting',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => '#',
                'icon_menu' => 'icon-cogs',
                'urutan' => 1,
                'created_at' => '2019-03-25 08:56:03',
                'updated_at' => '2019-04-11 09:32:32',
            ),
            1 => 
            array (
                'id' => 2,
                'nama_menu' => 'Role',
                'parrent' => 1,
                'nama_parrent' => NULL,
                'link' => 'roles',
                'icon_menu' => 'icon-accessibility',
                'urutan' => 3,
                'created_at' => '2019-03-25 16:14:10',
                'updated_at' => '2019-04-23 02:56:17',
            ),
            2 => 
            array (
                'id' => 3,
                'nama_menu' => 'Menu Backoffice',
                'parrent' => 1,
                'nama_parrent' => NULL,
                'link' => 'menus',
                'icon_menu' => 'icon-list2',
                'urutan' => 1,
                'created_at' => '2019-03-26 00:00:00',
                'updated_at' => '2019-04-23 02:55:28',
            ),
            3 => 
            array (
                'id' => 4,
                'nama_menu' => 'Users',
                'parrent' => 1,
                'nama_parrent' => NULL,
                'link' => 'users',
                'icon_menu' => 'icon-people',
                'urutan' => 2,
                'created_at' => '2019-03-25 17:31:04',
                'updated_at' => '2019-04-23 02:56:46',
            ),
            4 => 
            array (
                'id' => 5,
                'nama_menu' => 'Manage Content WEB',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => '#',
                'icon_menu' => 'icon-earth',
                'urutan' => 2,
                'created_at' => '2019-03-25 17:32:23',
                'updated_at' => '2019-04-11 09:34:41',
            ),
            5 => 
            array (
                'id' => 6,
                'nama_menu' => 'Manage Blog',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => 'berita',
                'icon_menu' => 'icon-newspaper2',
                'urutan' => NULL,
                'created_at' => '2019-03-25 17:32:55',
                'updated_at' => '2019-03-28 04:43:28',
            ),
            6 => 
            array (
                'id' => 7,
                'nama_menu' => 'Developer',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'developer',
                'icon_menu' => 'icon-circle-code',
                'urutan' => 4,
                'created_at' => '2019-03-26 04:01:39',
                'updated_at' => '2019-04-11 09:36:37',
            ),
            7 => 
            array (
                'id' => 8,
                'nama_menu' => 'Blog Kategori',
                'parrent' => 6,
                'nama_parrent' => NULL,
                'link' => 'blogcategories',
                'icon_menu' => 'icon-three-bars',
                'urutan' => NULL,
                'created_at' => '2019-03-28 04:20:36',
                'updated_at' => '2019-03-28 07:42:07',
            ),
            8 => 
            array (
                'id' => 9,
                'nama_menu' => 'Blog Posts',
                'parrent' => 6,
                'nama_parrent' => NULL,
                'link' => 'blogs',
                'icon_menu' => 'icon-newspaper',
                'urutan' => NULL,
                'created_at' => '2019-03-28 04:44:27',
                'updated_at' => '2019-03-28 07:41:46',
            ),
            9 => 
            array (
                'id' => 10,
                'nama_menu' => 'Halaman Web',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => 'pages',
                'icon_menu' => 'icon-stack',
                'urutan' => NULL,
                'created_at' => '2019-03-28 04:47:04',
                'updated_at' => '2019-03-28 07:40:54',
            ),
            10 => 
            array (
                'id' => 11,
                'nama_menu' => 'Pengaturan Menu Web',
                'parrent' => 1,
                'nama_parrent' => NULL,
                'link' => 'frontend_menus',
                'icon_menu' => 'icon-menu2',
                'urutan' => 4,
                'created_at' => '2019-03-28 04:49:15',
                'updated_at' => '2019-04-23 02:57:01',
            ),
            11 => 
            array (
                'id' => 12,
                'nama_menu' => 'Manage Galeri',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => '#',
                'icon_menu' => 'icon-movie',
                'urutan' => 3,
                'created_at' => '2019-04-11 09:10:18',
                'updated_at' => '2019-04-12 02:32:02',
            ),
            12 => 
            array (
                'id' => 14,
                'nama_menu' => 'Galeri Photos',
                'parrent' => 12,
                'nama_parrent' => NULL,
                'link' => 'album_photos',
                'icon_menu' => 'icon-images3',
                'urutan' => 1,
                'created_at' => '2019-04-12 02:31:10',
                'updated_at' => '2019-04-12 04:13:14',
            ),
            13 => 
            array (
                'id' => 15,
                'nama_menu' => 'Galeri Videos',
                'parrent' => 12,
                'nama_parrent' => NULL,
                'link' => 'video_galleries',
                'icon_menu' => 'icon-video-camera',
                'urutan' => 2,
                'created_at' => '2019-04-12 02:33:04',
                'updated_at' => '2019-04-12 02:33:04',
            ),
            14 => 
            array (
                'id' => 16,
                'nama_menu' => 'Manage File',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => '#',
                'icon_menu' => 'icon-files-empty2',
                'urutan' => 3,
                'created_at' => '2019-04-16 08:09:46',
                'updated_at' => '2019-04-16 08:09:46',
            ),
            15 => 
            array (
                'id' => 17,
                'nama_menu' => 'File Kategori',
                'parrent' => 16,
                'nama_parrent' => NULL,
                'link' => 'file_categories',
                'icon_menu' => 'icon-file-text2',
                'urutan' => 1,
                'created_at' => '2019-04-16 08:11:26',
                'updated_at' => '2019-04-16 08:11:26',
            ),
            16 => 
            array (
                'id' => 18,
                'nama_menu' => 'File Upload',
                'parrent' => 16,
                'nama_parrent' => NULL,
                'link' => 'file_uploads',
                'icon_menu' => 'icon-file-upload',
                'urutan' => 2,
                'created_at' => '2019-04-16 08:12:38',
                'updated_at' => '2019-04-16 08:12:38',
            ),
            17 => 
            array (
                'id' => 19,
                'nama_menu' => 'Slider',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => 'sliders',
                'icon_menu' => 'icon-image3',
                'urutan' => 4,
                'created_at' => '2019-04-22 06:32:04',
                'updated_at' => '2019-04-22 06:42:54',
            ),
            18 => 
            array (
                'id' => 20,
                'nama_menu' => 'Running Text',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => 'runningtext',
                'icon_menu' => 'icon-text-width',
                'urutan' => 5,
                'created_at' => '2019-04-22 09:19:23',
                'updated_at' => '2019-04-22 09:19:23',
            ),
            19 => 
            array (
                'id' => 21,
                'nama_menu' => 'Link',
                'parrent' => 5,
                'nama_parrent' => NULL,
                'link' => 'links',
                'icon_menu' => 'icon-link',
                'urutan' => 6,
                'created_at' => '2019-04-22 09:21:10',
                'updated_at' => '2019-04-22 09:21:10',
            ),
            20 => 
            array (
                'id' => 22,
                'nama_menu' => 'Survey',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'survey',
                'icon_menu' => 'icon-compose',
                'urutan' => 5,
                'created_at' => '2019-08-26 04:44:15',
                'updated_at' => '2019-08-26 04:44:15',
            ),
            21 => 
            array (
                'id' => 23,
                'nama_menu' => 'User Responden',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'responden',
                'icon_menu' => 'icon-users',
                'urutan' => 6,
                'created_at' => '2019-08-26 07:08:58',
                'updated_at' => '2019-08-26 07:12:50',
            ),
            22 => 
            array (
                'id' => 24,
                'nama_menu' => 'Peneliti',
                'parrent' => 0,
                'nama_parrent' => 'ROOT',
                'link' => 'users',
                'icon_menu' => 'icon-people',
                'urutan' => 7,
                'created_at' => '2019-08-27 03:57:19',
                'updated_at' => '2019-08-27 03:58:30',
            ),
            23 => 
            array (
                'id' => 25,
                'nama_menu' => 'Responden',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'users',
                'icon_menu' => 'icon-people',
                'urutan' => 8,
                'created_at' => '2019-08-27 04:42:49',
                'updated_at' => '2019-08-27 04:42:49',
            ),
            24 => 
            array (
                'id' => 26,
                'nama_menu' => 'Survey Result',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'surveyresult',
                'icon_menu' => 'icon-graph',
                'urutan' => 10,
                'created_at' => '2019-09-24 04:19:14',
                'updated_at' => '2019-09-24 04:19:14',
            ),
            25 => 
            array (
                'id' => 27,
                'nama_menu' => 'Dashboard',
                'parrent' => 0,
                'nama_parrent' => NULL,
                'link' => 'home',
                'icon_menu' => 'icon-home4',
                'urutan' => 0,
                'created_at' => '2019-09-25 07:42:05',
                'updated_at' => '2019-09-25 07:47:08',
            ),
        ));
        
        
    }
}