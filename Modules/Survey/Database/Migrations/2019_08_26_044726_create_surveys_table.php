<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


    	Schema::create('surveys', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('nama')->nullable()->comment('judul survey');
    		$table->text('deskripsi')->nullable()->comment('deskripsi survey');
    		$table->boolean('status')->default(0)->comment('0 public, 1 private');
    		$table->integer('user_id')->nullable()->comment('user creator');
        $table->timestamp('date_from')->comment('tanggal awal quiz')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('date_to')->comment('tanggal akhir quiz')->default(DB::raw('CURRENT_TIMESTAMP'));
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
    	Schema::dropIfExists('surveys');
    }
  }
