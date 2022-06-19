<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerPostsTable extends Migration
{
    public function up()
    {
        Schema::table('customer_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6028957')->references('id')->on('users');
            $table->unsignedBigInteger('from_id')->nullable();
            $table->foreign('from_id', 'from_fk_6028958')->references('id')->on('states');
            $table->unsignedBigInteger('to_id')->nullable();
            $table->foreign('to_id', 'to_fk_6028959')->references('id')->on('states');
            $table->unsignedBigInteger('delivery_type_id')->nullable();
            $table->foreign('delivery_type_id', 'delivery_type_fk_6028962')->references('id')->on('delivery_types');
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->foreign('vehicle_type_id', 'vehicle_type_fk_6028963')->references('id')->on('vehicle_types');
            $table->unsignedBigInteger('load_type_id')->nullable();
            $table->foreign('load_type_id', 'load_type_fk_6028966')->references('id')->on('load_types');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_6028970')->references('id')->on('currencies');
        });
    }
}
