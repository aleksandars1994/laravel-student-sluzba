<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListOfDebthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_of_debths', function (Blueprint $table) {
            $table->increments('id');
            $table->char('stud_id',10);
            $table->integer('debth_id');
            $table->foreign('stud_id')->references('student_id')->on('students');
            $table->foreign('debth_id')->references('fee_id')->on('t_fees');
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
        Schema::dropIfExists('list_of_debths');
    }
}
