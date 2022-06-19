<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehiclesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicles', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_type_id')->nullable();
            $table->foreign('delivery_type_id', 'delivery_type_fk_6028695')->references('id')->on('delivery_types');
        });
    }
}
