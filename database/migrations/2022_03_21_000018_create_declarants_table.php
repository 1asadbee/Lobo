<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeclarantsTable extends Migration
{
    public function up()
    {
        Schema::create('declarants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('declaration')->default(0);
            $table->boolean('settlement_fee')->default(0);
            $table->boolean('registration_certificate')->default(0);
            $table->boolean('obtaining_license')->default(0);
            $table->boolean('obtaining_permits')->default(0);
            $table->boolean('unusual_cargo')->default(0);
            $table->boolean('insurance')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }
}
