<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user')->references('nama_user')->on('users');
            $table->string('nama_mobil')->references('nama_mobil')->on('data_mobil');
            $table->string('plat_nomor')->references('plat_nomor')->on('data_mobil');
            $table->dateTime('tgl_pinjam')->references('tgl_pinjam')->on('transaksi');
            $table->dateTime('tgl_kembali')->references('tgl_kembali')->on('transaksi');
            $table->integer('harga')->references('harga')->on('transaksi');
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
        Schema::dropIfExists('laporan');
    }
}
