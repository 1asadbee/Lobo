<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_uz');
            $table->string('name_cy');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('name_tr');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
