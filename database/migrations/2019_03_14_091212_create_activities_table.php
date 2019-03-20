<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_1')->nullable();
            $table->integer('test_2')->nullable();
            $table->integer('test_3')->nullable();
            $table->integer('term_paper_1')->nullable();
            $table->integer('term_paper_2')->nullable();
            $table->timestamps();
        });
        Schema::table('activities',function(Blueprint $table){
             $table->integer('exam')->nullable()->after('term_paper_2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
