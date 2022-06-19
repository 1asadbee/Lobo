<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesCustomerPostsTable extends Migration
{
    public function up()
    {
        Schema::table('expenses_customer_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6177390')->references('id')->on('users');
            $table->unsignedBigInteger('customer_post_id')->nullable();
            $table->foreign('customer_post_id', 'customer_post_fk_6177393')->references('id')->on('customer_posts');
        });
    }
}
