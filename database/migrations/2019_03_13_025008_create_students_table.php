<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->char('student_id');
            $table->primary('student_id');
            $table->char('s_year');
            $table->text('name');
            $table->text('last_name');
            $table->text('parent_name');
            $table->text('gender');
            $table->text('date_of_birth');
            $table->text('city');
            $table->integer('pin');
            $table->string('email');
            $table->integer('users_id')->unsigned();
            $table->text('password');
            $table->integer('phone_num');
            $table->integer('mobile_num');
        });
        Schema::table('students',function(Blueprint $table){
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
