<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_consultations', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('patient_id');
            $table->string('pulse');
            $table->string('blood_pressure');
            $table->string('respiration');
            $table->text('reason_consultation');
            $table->text('treatment');
            $table->string('treated_by');
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
        Schema::dropIfExists('patient_consultations');
    }
}
