<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->integer('code');
            $table->primary('code');
            $table->text('name');
            $table->integer('n.gr');
            $table->text('type_of_teaching');
            $table->integer('school_year');
            $table->text('type_of_application');
            $table->text('term');
            $table->integer('test1');
            $table->integer('test2');
            $table->integer('test3');
            $table->integer('term_paper_1');
            $table->integer('term_paper_2');
            $table->integer('exam');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
