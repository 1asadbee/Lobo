<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPostsDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::create('customer_posts_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('description');
            $table->timestamps();
        });
    }
}
