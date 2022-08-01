<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->integer('tahun_mobil');
            $table->integer('seat_mobil')->nullable();
            $table->string('plat_nomor');
            $table->string('transmisi')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('status')->nullable()->default('tersedia');
            $table->string('foto_mobil')->nullable();
            $table->integer('harga')->unsigned()->nullable();
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
        Schema::dropIfExists('data_mobil');
    }
}
