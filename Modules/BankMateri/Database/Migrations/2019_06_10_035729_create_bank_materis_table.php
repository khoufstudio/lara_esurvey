<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori');
            $table->integer('jenis_surat');
            $table->string('perihal');
            $table->string('no_surat');
            $table->dateTime('tgl_surat');
            $table->string('file_doc');
            $table->integer('direktorat');
            $table->integer('subdit');
            $table->dateTime('masa_aktif');
            $table->tinyInteger('status');
            $table->text('ket');
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
        Schema::dropIfExists('arsips');
    }
}
