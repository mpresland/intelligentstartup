<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeisEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neis-enterprises', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('region');
            $table->string('state');
            $table->string('enterprises');
            $table->string('successes');

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
        Schema::dropIfExists('neis-enterprises');
    }
}
