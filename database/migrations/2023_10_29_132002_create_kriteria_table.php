<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('kdKriteria');
            $table->string('kriteria', 100);
            $table->char('sifat', 1);
            $table->integer('bobot');
            $table->text('detail');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
