<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriersTable extends Migration
{
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicle_number')->unique();
            $table->timestamps();
        });
    }
}
