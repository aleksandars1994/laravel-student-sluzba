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
            $table->integer('code');
            $table->primary('code');
            $table->text('name');
            $table->integer('n_gr');
            $table->text('type_of_sign');
            $table->integer('points');
            $table->integer('grade');
            $table->integer('espb');
            $table->text('deadline');
            $table->text('exam-date');
            $table->text('signed_by');
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
