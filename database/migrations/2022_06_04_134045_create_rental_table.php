<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mobil_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('mobil_id')->references('id')->on('data_mobil');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_user')->references('nama_user')->on('users');
            $table->string('nama_mobil')->references('nama_mobil')->on('data_mobil');
            $table->string('plat_nomor')->references('plat_nomor')->on('data_mobil')->nullable();
            $table->string('user_nomor')->references('user_nomor')->on('users');
            $table->string('jaminan');
            $table->string('layanan');
            $table->dateTime('tgl_pinjam')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->integer('harga')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('hari');
            $table->string('status')->nullable();
            $table->string('pembayaran')->nullable();
            $table->string('bukti')->nullable();
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
