<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarrierPostsTable extends Migration
{
    public function up()
    {
        Schema::table('carrier_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6028735')->references('id')->on('users');
            $table->unsignedBigInteger('from_id')->nullable();
            $table->foreign('from_id', 'from_fk_6028736')->references('id')->on('states');
            $table->unsignedBigInteger('to_id')->nullable();
            $table->foreign('to_id', 'to_fk_6028737')->references('id')->on('states');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_6177160')->references('id')->on('currencies');
        });
    }
}
