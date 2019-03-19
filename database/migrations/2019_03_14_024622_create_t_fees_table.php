<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->text('school_year')->nullable();
            $table->text('study_year')->nullable();
            $table->text('status_of_registration')->nullable();
            $table->text('method_of_registration')->nullable();
            $table->text('type_of_payment')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('rate_number')->nullable();
            $table->integer('amount')->nullable();
            $table->text('payment_deadline')->nullable();
        });
        Schema::table('t_fees',function(Blueprint $table){
            $table->char('stud_id')->after('id');
            $table->foreign('stud_id')->references('student_id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_fees');
    }
}
