<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubkriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subkriteria', function (Blueprint $table) {
            $table->id('kdSubKriteria');
            $table->string('subKriteria', 50);
            $table->integer('value');
            $table->unsignedBigInteger('kdKriteria');
            $table->foreign('kdKriteria')->references('kdKriteria')->on('kriteria');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subkriteria');
    }
}
