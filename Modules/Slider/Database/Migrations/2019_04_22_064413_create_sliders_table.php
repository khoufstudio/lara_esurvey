<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_name')->nullable();
            $table->text('slider_desc')->nullable();
            $table->string('gambar')->nullable();
            $table->string('create_author')->nullable();
            $table->enum('publish', ['Y', 'N'])->nullable();
            $table->string('link')->nullable();
            $table->integer('category')->nullable()->unsigned();
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
        Schema::dropIfExists('sliders');
    }
}
