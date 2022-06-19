<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeclarantsDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('declarants_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('declarant_id')->nullable();
            $table->foreign('declarant_id', 'declarant_fk_6177263')->references('id')->on('declarants');
        });
    }
}
