<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->date('birth_date');
            $table->enum('gender', ["male","female"]);
            $table->string('blood_type')->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ["contenue","finish"]);
            $table->enum('payment', ["cash","card","check"]);
            $table->double('debt');
            $table->double('payed');
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
        Schema::dropIfExists('patients');
    }
}
