<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesCarrierPostsTable extends Migration
{
    public function up()
    {
        Schema::create('expenses_carrier_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('spent_coins');
            $table->string('for');
            $table->timestamps();
        });
    }
}
