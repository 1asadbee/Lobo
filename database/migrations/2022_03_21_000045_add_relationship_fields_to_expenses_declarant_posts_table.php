<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesDeclarantPostsTable extends Migration
{
    public function up()
    {
        Schema::table('expenses_declarant_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6177398')->references('id')->on('users');
            $table->unsignedBigInteger('declarant_post_id')->nullable();
            $table->foreign('declarant_post_id', 'declarant_post_fk_6177401')->references('id')->on('declarants');
        });
    }
}
