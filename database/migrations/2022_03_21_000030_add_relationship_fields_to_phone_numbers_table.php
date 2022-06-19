<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPhoneNumbersTable extends Migration
{
    public function up()
    {
        Schema::table('phone_numbers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6025187')->references('id')->on('users');
        });
    }
}
