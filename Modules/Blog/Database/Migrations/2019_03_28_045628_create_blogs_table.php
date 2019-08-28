<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category')->unsigned();
            $table->string('blog_name')->nullable();
            $table->string('blog_name_eng')->nullable();
            $table->text('blog_desc')->nullable();
            $table->text('blog_desc_eng')->nullable();
            $table->string('file_foto')->nullable();
            $table->enum('publish', ['Y', 'N'])->default('N');
            $table->string('link')->nullable();
            $table->integer('be_read')->unsigned()->nullable();
            $table->string('sys_user_name')->nullable();
            $table->string('create_author')->nullable();
            $table->text('post_slug')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
