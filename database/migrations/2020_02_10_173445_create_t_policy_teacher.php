<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPolicyTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_policy_teacher', function (Blueprint $table) {
            $table->bigIncrements('policy_id');
            $table->integer('mapel_id');
            $table->integer('teacher_id');
            $table->string('verification',1);
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_policy_teacher');
    }
}
