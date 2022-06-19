<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz')->unique();
            $table->string('name_cy');
            $table->string('name_ru')->unique();
            $table->string('name_en')->unique();
            $table->string('name_tr')->unique();
            $table->timestamps();
        });
    }
}
