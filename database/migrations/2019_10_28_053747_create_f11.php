<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateF11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_f11', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eacode', '20')->nullable();
            $table->string('hcn', '4')->nullable();
            $table->string('shsn', '4')->nullable();
            $table->string('member_code', '2')->nullable();
            $table->string('surname')->nullable();
            $table->string('givenname')->nullable();
            $table->integer('nbi')->nullable();
            $table->string('mom')->nullable();
            $table->integer('adopted')->nullable();
            $table->integer('biomom')->nullable();
            $table->integer('biodad')->nullable();
            $table->string('dad')->nullable();
            $table->date('dbirth')->nullable();
            $table->date('refdate')->nullable();
            $table->integer('es_dbi')->nullable();
            $table->float('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('csc')->nullable();
            $table->string('psc')->nullable();
            $table->integer('maternal')->nullable();
            $table->integer('rhc')->nullable();
            $table->string('educ')->nullable();
            $table->string('educ_course')->nullable();
            $table->string('educ_oth')->nullable();
            $table->integer('school')->nullable();
            $table->string('work')->nullable();
            $table->string('occupation')->nullable();
            $table->string('occupation_code')->nullable();
            $table->integer('wrkplace')->nullable();
            $table->string('w_class')->nullable();
            $table->string('religion')->nullable();
            $table->string('oth_rel')->nullable();
            $table->string('othrel')->nullable();
            $table->string('remarks')->nullable();
            $table->string('memkey')->nullable();
            $table->string('date_added')->nullable();
            $table->string('date_edit')->nullable();
            $table->integer('interview_status')->nullable();
            $table->string('interview_status_oth')->nullable();
            $table->string('interview_status1')->nullable();
            $table->string('interview_status2')->nullable();
            $table->string('interview_status3')->nullable();
            $table->string('visit1')->nullable();
            $table->string('visit2')->nullable();
            $table->string('visit3')->nullable();
            $table->string('comment1')->nullable();
            $table->string('comment2')->nullable();
            $table->string('comment3')->nullable();
            $table->string('interview_statusf')->nullable();
            $table->string('username')->nullable();
            $table->timestamp('date_inserted')->nullable();
            $table->string('is_f32')->nullable();
            $table->string('is_f41')->nullable();
            $table->string('is_f42')->nullable();
            $table->string('is_f43')->nullable();
            $table->string('is_f44')->nullable();
            $table->string('is_f45')->nullable();
            $table->string('is_f46')->nullable();
            $table->string('is_f47')->nullable();
            $table->string('is_f48')->nullable();
            $table->string('is_f49')->nullable();
            $table->string('is_f410')->nullable();
            $table->string('is_f52')->nullable();
            $table->string('is_f53')->nullable();
            $table->string('is_f54')->nullable();
            $table->string('is_f55')->nullable();
            $table->string('is_f56')->nullable();
            $table->string('is_f57')->nullable();
            $table->string('is_f58')->nullable();
            $table->string('is_f73')->nullable();
            $table->string('is_f82')->nullable();
            $table->string('is_f31')->nullable();
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
        Schema::dropIfExists('d_f11');
    }
}
