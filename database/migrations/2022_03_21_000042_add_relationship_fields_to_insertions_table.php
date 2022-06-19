<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInsertionsTable extends Migration
{
    public function up()
    {
        Schema::table('insertions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6177366')->references('id')->on('users');
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id', 'currency_fk_6177368')->references('id')->on('currencies');
        });
    }
}
