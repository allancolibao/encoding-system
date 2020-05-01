<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateF74QuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f74_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f74_q_no')->nullable();
            $table->string('f74_cat_text', '250')->nullable();
            $table->string('f74_tick_text', '250')->nullable();
            $table->string('f74_q_text', '250')->nullable();
            $table->string('f74_alt_q_text', '250')->nullable();
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
        Schema::dropIfExists('f74_questions');
    }
}
