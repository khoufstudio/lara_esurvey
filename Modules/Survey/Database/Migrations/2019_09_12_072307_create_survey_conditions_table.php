<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('survey_answer_id');
            $table->string('answer')->nullable();
            $table->string('condition')->comment('l = loncat, h = hide');
            $table->string('jump')->comment('e = exit, s = selanjutnya, angka = nomor soal');
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
        Schema::dropIfExists('survey_conditions');
    }
}
