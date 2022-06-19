<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesCarrierPostsTable extends Migration
{
    public function up()
    {
        Schema::table('expenses_carrier_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6177382')->references('id')->on('users');
            $table->unsignedBigInteger('carrier_post_id')->nullable();
            $table->foreign('carrier_post_id', 'carrier_post_fk_6177385')->references('id')->on('carrier_posts');
        });
    }
}
