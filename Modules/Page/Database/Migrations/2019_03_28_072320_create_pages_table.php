<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pages_name')->nullable();
            $table->string('pages_name_eng')->nullable();
            $table->text('pages_desc')->nullable();
            $table->text('pages_desc_eng')->nullable();
            $table->string('create_author')->nullable();
            $table->enum('publish', ['Y', 'N'])->default('N');
            $table->string('file_foto')->nullable();
            $table->integer('category')->unsigned()->nullable();
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
        Schema::dropIfExists('pages');
    }
}
