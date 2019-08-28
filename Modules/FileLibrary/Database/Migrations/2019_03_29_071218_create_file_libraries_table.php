<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_file')->nullable();
            $table->integer('id_user')->unsigned();
            $table->string('path');
            $table->string('publish', 1);
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
        Schema::dropIfExists('file_libraries');
    }
}
