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
        Schema::create('patient_medications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor('App\Models\Patient')->constrained();
            $table->foreignIdFor('App\Models\Medication')->constrained();
            $table->date('date_start');
            $table->date('date_stop')->nullable();
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
        Schema::dropIfExists('patient_medications');
    }
};
