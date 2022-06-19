<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVehicleTypesTable extends Migration
{
    public function up()
    {
        Schema::table('vehicle_types', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->foreign('vehicle_id', 'vehicle_fk_6028705')->references('id')->on('vehicles');
        });
    }
}
