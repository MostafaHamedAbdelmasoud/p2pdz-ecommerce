<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('user_verified');
            $table->longText('label');
            $table->longText('main_category');
            $table->longText('sub_category');
            $table->integer('quantity');
            $table->longText('description');
            $table->longText('tags');
            $table->longText('duration');
            $table->longText('requirements');
            $table->integer('state')->default(1)->comment('user stop/activate the service');
            $table->integer('reviewed')->default(0)->comment('reviewed by the adminstrator if new service');
            $table->integer('availability')->default(0)->comment('adminstrator stop/activate the service');
            $table->integer('rate')->default(0);
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
        Schema::dropIfExists('services');
    }
}
