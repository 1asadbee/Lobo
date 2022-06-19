<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierPostsDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('carrier_posts_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');
            $table->timestamps();
        });
    }
}
