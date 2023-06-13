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
            $table->string('mobil_nama')->references('nama_mobil')->on('data_mobil');
            $table->string('mobil_nomor')->references('plat_nomor')->on('data_mobil');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('user_nama')->references('nama_user')->on('users');
            $table->string('user_nomor')->references('nomor_hp')->on('users');
            $table->string('driver');
            $table->dateTime('tgl_pinjam')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->string('hari');
            $table->integer('harga');
            $table->string('jaminan');
            $table->string('pembayaran');
            $table->string('status')->default('Unpaid');
            $table->string('bukti')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
