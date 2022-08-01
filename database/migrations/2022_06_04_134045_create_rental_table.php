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
            $table->string('invoice_no')->nullable()->default('text');
            $table->dateTime('tgl_pinjam')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->integer('harga')->unsigned()->nullable();
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
