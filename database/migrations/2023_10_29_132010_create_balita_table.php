<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balita', function (Blueprint $table) {
            $table->id('kdbalita');
            $table->string('balita', 50);
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role');
        });
    }

    public function down()
    {
        Schema::dropIfExists('balita');
    }
}
