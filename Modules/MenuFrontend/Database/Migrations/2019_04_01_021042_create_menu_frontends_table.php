<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_frontends', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_menu', 100);
            $table->string('nama_menu_eng', 100)->nullable();
            $table->integer('parrent');
            $table->string('nama_parrent', 100)->nullable();
            $table->string('link', 100)->nullable();
            $table->string('nama_link')->nullable();
            $table->integer('kategori')->nullable();
            $table->text('description', 100)->nullable();
            $table->string('file', 100)->nullable();
            $table->integer('urutan')->nullable();
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
        Schema::dropIfExists('menu_frontends');
    }
}
