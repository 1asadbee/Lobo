<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomerPostsDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('customer_posts_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_post_id')->nullable();
            $table->foreign('customer_post_id', 'customer_post_fk_6177220')->references('id')->on('customer_posts');
        });
    }
}
