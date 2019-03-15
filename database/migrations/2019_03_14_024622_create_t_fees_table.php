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
            $table->text('school_year');
            $table->text('study_year');
            $table->text('status_of_registration');
            $table->text('method_of_registration');
            $table->text('type_of_payment');
            $table->integer('rate');
            $table->integer('rate_number');
            $table->integer('amount');
            $table->text('payment_deadline');
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
