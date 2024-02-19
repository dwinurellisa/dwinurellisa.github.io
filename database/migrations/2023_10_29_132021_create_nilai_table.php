<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kdbalita');
            $table->unsignedBigInteger('kdKriteria');
            $table->integer('nilai');
            $table->unique(['kdbalita', 'kdKriteria']);
            $table->foreign('kdbalita')->references('kdbalita')->on('balita'); // Corrected typo here
            $table->foreign('kdKriteria')->references('kdKriteria')->on('kriteria');
        });
    }


    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
