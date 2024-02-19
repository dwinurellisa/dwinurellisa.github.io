<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalitasTable extends Migration
{
    public function up()
    {
        Schema::create('data_balita', function (Blueprint $table) {
            $table->id();
            $table->string('nama_balita');
            $table->string('nik');
            $table->string('nama_orangtua');
            $table->string('alamat_rt_rw');
            $table->tinyInteger('jenis_kelamin')->comment('1: Laki-laki, 2: Perempuan');
            $table->date('tanggal_timbang');
            $table->date('tanggal_lahir');
            $table->integer('umur_bulan');
            $table->decimal('berat_badan', 5, 2); // Misalnya, 5 digit dengan 2 digit di belakang koma
            $table->decimal('tinggi_badan', 5, 2); // Misalnya, 5 digit dengan 2 digit di belakang koma
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('balitas');
    }
}
