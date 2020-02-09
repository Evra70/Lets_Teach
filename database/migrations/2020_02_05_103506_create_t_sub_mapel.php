<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSubMapel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sub_mapel', function (Blueprint $table) {
            $table->bigIncrements('sub_mapel_id');
            $table->integer('mapel_id');
            $table->string('kode_sub_mapel',15)->unique();
            $table->string('nama_sub_mapel',150);
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
        Schema::dropIfExists('t_sub_mapel');
    }
}
