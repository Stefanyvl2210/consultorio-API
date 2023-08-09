<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('users');
            $table->foreignId('doctor_id')->constrained('users');
            $table->foreignId('treatment_id')->constrained('treatment');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('type', ['Cita Previa', 'Cita Formal'])->nullable();
            $table->enum('status', ['Pendiente', 'Aceptada', 'Rechazada', 'Cancelada'])->default('Pendiente');
            $table->foreignId('survey_id')->constrained('survey');
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
        Schema::dropIfExists('appointment');
    }
};
