<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEntriesTable extends Migration
{
    public function up()
    {
        Schema::table('entries', function (Blueprint $table) {
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->foreign('medicine_id', 'medicine_fk_2997028')->references('id')->on('medicines');
            $table->unsignedBigInteger('prescription_id')->nullable();
            $table->foreign('prescription_id', 'prescription_fk_2997029')->references('id')->on('prescriptions');
        });
    }
}