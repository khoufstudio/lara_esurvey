<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password');
            $table->string('hp')->nullable();
            $table->integer('id_user_group')->default("2")->comment('1 = Super Admin, 2 = Pimpinan, 3 = Peneliti, 4 = Responden');
            $table->boolean('is_admin')->default(false);
            // $table->tinyInteger('id_direktorat')->nullable();
            $table->tinyInteger('status')->default('0');
            // $table->boolean('litbang')->default('0')->comment('0 = bukan, 1 = litbang')->nullable();
            $table->integer('litbang_id')->default('0')->nullable();
            // $table->boolean('peneliti')->default('0')->comment('0 = bukan, 1 = peneliti')->nullable();
            $table->integer('peneliti_id')->default('0')->nullable();
            // $table->boolean('responden')->default('0')->comment('0 = bukan, 1 = peniliti')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
