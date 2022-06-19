<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrailerSizesTable extends Migration
{
    public function up()
    {
        Schema::table('trailer_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6249804')->references('id')->on('users');
        });
    }
}
