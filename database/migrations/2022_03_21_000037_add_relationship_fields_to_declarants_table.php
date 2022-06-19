<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDeclarantsTable extends Migration
{
    public function up()
    {
        Schema::table('declarants', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6029006')->references('id')->on('users');
        });
    }
}
