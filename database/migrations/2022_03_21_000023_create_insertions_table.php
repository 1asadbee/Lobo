<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsertionsTable extends Migration
{
    public function up()
    {
        Schema::create('insertions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('given_money');
            $table->integer('taken_coins');
            $table->timestamps();
        });
    }
}
