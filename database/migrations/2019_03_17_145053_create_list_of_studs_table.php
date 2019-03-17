<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListOfStudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_studs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stud_email');
            $table->text('user_email');
            $table->foreign('stud_email')->references('email')->on('students');
            $table->foreign('user_email')->references('email')->on('users');
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
        Schema::dropIfExists('list_of_studs');
    }
}
