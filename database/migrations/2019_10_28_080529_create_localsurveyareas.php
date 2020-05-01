<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsurveyareas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localsurveyareas', function (Blueprint $table) {
            $table->increments('row_id');
            $table->string('areaname', '250');
            $table->string('eacode', '20');
            $table->string('latitude', '50');
            $table->string('longitude', '50');
            $table->string('covered', '100');
            $table->string('not_covered', '100');
            $table->string('status', '1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localsurveyareas');
    }
}
