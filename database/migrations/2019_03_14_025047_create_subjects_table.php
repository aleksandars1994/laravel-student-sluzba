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
            $table->increments('id');
            $table->text('name');
            $table->integer('n_gr');
            $table->text('type_of_teaching');
            $table->text('school_year');
            $table->text('type_of_application');
            $table->text('term');
            $table->integer('test_1')->default(0);
            $table->integer('test_2')->default(0);
            $table->integer('test_3')->default(0);
            $table->integer('term_paper_1')->default(0);
            $table->integer('term_paper_2')->default(0);
            $table->integer('exam')->dafault(0);
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
