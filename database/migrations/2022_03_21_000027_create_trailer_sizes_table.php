<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailerSizesTable extends Migration
{
    public function up()
    {
        Schema::create('trailer_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('weight');
            $table->integer('height');
            $table->integer('width');
            $table->integer('length');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
