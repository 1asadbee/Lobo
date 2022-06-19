<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarriersTable extends Migration
{
    public function up()
    {
        Schema::table('carriers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6028718')->references('id')->on('users');
            $table->unsignedBigInteger('vehicle_model_id')->nullable();
            $table->foreign('vehicle_model_id', 'vehicle_model_fk_6028719')->references('id')->on('vehicle_models');
            $table->unsignedBigInteger('delivery_type_id')->nullable();
            $table->foreign('delivery_type_id', 'delivery_type_fk_6028720')->references('id')->on('delivery_types');
            $table->unsignedBigInteger('vehicle_type_id')->nullable();
            $table->foreign('vehicle_type_id', 'vehicle_type_fk_6028721')->references('id')->on('vehicles');
            $table->unsignedBigInteger('trailer_size_id')->nullable();
            $table->foreign('trailer_size_id', 'trailer_size_fk_6244166')->references('id')->on('trailer_sizes');
        });
    }
}
