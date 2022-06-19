<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPostsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('from_city');
            $table->string('to_city');
            $table->string('load');
            $table->integer('weight')->nullable();
            $table->string('area')->nullable();
            $table->date('date')->nullable();
            $table->integer('price');
            $table->timestamps();
        });
    }
}
