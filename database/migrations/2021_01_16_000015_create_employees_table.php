<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('job')->nullable();
            $table->decimal('salary', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}