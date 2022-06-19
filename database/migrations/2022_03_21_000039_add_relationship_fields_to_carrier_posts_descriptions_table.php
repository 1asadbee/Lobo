<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarrierPostsDescriptionsTable extends Migration
{
    public function up()
    {
        Schema::table('carrier_posts_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('carrier_post_id')->nullable();
            $table->foreign('carrier_post_id', 'carrier_post_fk_6177190')->references('id')->on('carrier_posts');
        });
    }
}
