<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierPostsTable extends Migration
{
    public function up()
    {
        Schema::create('carrier_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->default(0)->nullable();
            $table->datetime('departure_time')->nullable();
            $table->integer('free_weight')->nullable();
            $table->string('free_area')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
        });
    }
}
