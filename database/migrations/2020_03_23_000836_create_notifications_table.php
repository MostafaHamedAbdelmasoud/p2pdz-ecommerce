<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('null if universal');
            $table->longText('content', 700);
            $table->string('language')->comment('user prefered language, this is a multi languages notifications system');
            $table->integer('seen')->default(false);
            $table->string('delete_token', 20);
            $table->string('source')->default('system');
            $table->integer('order_id')->default(0);
            $table->integer('issue_id')->default(0);
            $table->integer('sent')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
