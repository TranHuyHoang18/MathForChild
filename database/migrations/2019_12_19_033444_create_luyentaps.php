<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuyentaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luyentaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_student');
            $table->integer('id_class');
            $table->integer('id_week');
            $table->integer('dang');
            $table->integer('version');
            $table->longText('content');
            $table->longText('result');
            $table->integer('score');
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
        Schema::dropIfExists('luyentaps');
    }
}
