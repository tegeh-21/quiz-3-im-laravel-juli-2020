<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_proyek', 100);
            $table->text('deskripsi_proyek');
            $table->date('tanggal_mulai');
            $table->date('tanggal_deadline');
            $table->boolean('status');
            $table->string('manajer_nik', 5);
            $table->string('karyawan_nik', 5);
            $table->timestamps();

            $table->foreign('manajer_nik')->references('nik')->on('karyawan');
            $table->foreign('karyawan_nik')->references('nik')->on('karyawan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
}
