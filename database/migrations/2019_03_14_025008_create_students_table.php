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
            $table->text('student_id');
            $table->text('name');
            $table->text('last_name');
            $table->text('parent_name');
            $table->text('gender');
            $table->text('date_of_birth');
            $table->text('city');
            $table->integer('pin');
            $table->text('email');
            $table->text('password');
            $table->integer('phone_num');
            $table->integer('mobile_num');
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
