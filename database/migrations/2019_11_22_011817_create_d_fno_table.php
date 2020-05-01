<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDFnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_fno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FOLDERNO')->nullable();
            $table->string('AREACODE')->nullable();
            $table->string('PROVINCE')->nullable();
            $table->string('MUNICIPALITY')->nullable();
            $table->string('BARANGAY')->nullable();
            $table->string('BKLT9')->nullable();
            $table->string('BKLT10A')->nullable();
            $table->string('BKLT10B')->nullable();
            $table->string('BKLT10C')->nullable();
            $table->string('TOTALHHIND')->nullable();
            $table->string('BKLT9_CPAGE')->nullable();
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
        Schema::dropIfExists('d_fno');
    }
}

