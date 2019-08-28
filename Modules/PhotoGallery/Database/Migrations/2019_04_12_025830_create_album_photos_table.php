<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('albumphoto_name')->nullable();
            $table->string('albumphoto_name_eng')->nullable();
            $table->text('albumphoto_desc')->nullable();
            $table->text('albumphoto_desc_eng')->nullable();
            $table->string('create_author')->nullable();
            $table->string('sys_user_name')->nullable();
            $table->enum('publish', ['Y', 'N'])->nullable();
            $table->integer('sort_number')->nullable();
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
        Schema::dropIfExists('album_photos');
    }
}
