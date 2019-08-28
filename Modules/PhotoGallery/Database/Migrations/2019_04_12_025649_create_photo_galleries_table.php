<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_albumphoto')->nullable();
            $table->string('albumphoto_gallery_name')->nullable();
            $table->string('albumphoto_gallery_name_eng')->nullable();
            $table->text('albumphoto_gallery_desc')->nullable();
            $table->text('albumphoto_gallery_desc_eng')->nullable();
            $table->string('file_foto')->nullable();
            $table->string('create_author')->nullable();
            $table->string('sys_user_name')->nullable();
            $table->enum('publish',['Y','N'])->default('Y');
            $table->integer('sort_number')->nullable();
            $table->integer('type')->nullable();
            $table->string('file_foto_youtube')->nullable();
            $table->string('link_youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_galleries');
    }
}
