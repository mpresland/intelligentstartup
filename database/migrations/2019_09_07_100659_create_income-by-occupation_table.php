<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeByOccupationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income-by-occupation', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('occupation');
            $table->string('state');
            $table->string('individuals');
            $table->string('average_taxable_income');
            $table->string('median_taxable_income');
            $table->string('average_salary');
            $table->string('median_salary');
            $table->string('average_total_income');
            $table->string('median_total_income');

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
        //
    }
}
