<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTRiwayatTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_riwayat_transaksi', function (Blueprint $table) {
            $table->bigIncrements('riwayat_id');
            $table->string('kode_transaksi',50)->unique();
            $table->integer('user_id');
            $table->integer('mapel_id');
            $table->string('tgl_transaksi',14);
            $table->string('tgl_terima',14)->default("00000000000000");
            $table->integer('lama_sewa');
            $table->integer('teacher_id')->default(-1);
            $table->text('deskripsi_transaksi');
            $table->integer('biaya');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_riwayat_transaksi');
    }
}
