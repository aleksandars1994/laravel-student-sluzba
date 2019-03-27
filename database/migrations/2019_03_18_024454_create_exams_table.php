<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('code');
            $table->char('code_stud')->nullable();
            $table->integer('code_subject')->unsigned()->nullable();
            $table->integer('code_act')->unsigned()->nullable();
            $table->integer('points')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('espb')->nullable();//zapravo trebao bi double ali cilj je trenutno jednostavnost
            $table->text('deadline')->nullable();
            $table->text('date')->nullable();
            $table->text('signed_by')->nullable();

        });

        Schema::table('exams',function(Blueprint $table){
            $table->foreign('code_stud')->references('student_id')->on('students');
        });
        Schema::table('exams',function(Blueprint $table){
             $table->foreign('code_subject')->references('id')->on('subjects'); 
        });
        Schema::table('exams',function(Blueprint $table){
            $table->foreign('code_act')->references('id')->on('activities');
        });
        Schema::table('exams',function(Blueprint $table){
            $table->boolean('start')->default(0)->after('signed_by');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
