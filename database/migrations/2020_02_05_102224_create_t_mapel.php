<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_mapel', function (Blueprint $table) {
            $table->bigIncrements('mapel_id');
            $table->string('kode_mapel',15)->unique();
            $table->integer('kategori_id');
            $table->string('nama_mapel',30);
            $table->string('active',1);
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
        Schema::dropIfExists('t_mapel');
    }
}
