<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedianHousePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('median-house-prices', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('date');

            $table->float('median_price_sydney');
            $table->float('median_price_nsw');
            $table->float('median_price_melbourne');
            $table->float('median_price_vic');
            $table->float('median_price_brisbane');
            $table->float('median_price_qld');
            $table->float('median_price_adelaide');
            $table->float('median_price_sa');
            $table->float('median_price_perth');
            $table->float('median_price_wa');
            $table->float('median_price_hobart');
            $table->float('median_price_tas');
            $table->float('median_price_darwin');
            $table->float('median_price_nt');
            $table->float('median_price_canberra');

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
