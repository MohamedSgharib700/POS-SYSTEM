<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostpaidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postpaid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_service_number');
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('pos_id')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postpaid');
    }
}
