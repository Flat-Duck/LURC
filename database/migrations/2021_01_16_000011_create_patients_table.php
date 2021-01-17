<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('birth_date')->nullable();
            $table->longText('notes')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('status')->nullable();
            $table->string('payment')->nullable();
            $table->decimal('debt', 15, 2)->nullable();
            $table->decimal('payed', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}