<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('first_name')->nullable();
            $table->char('name')->nullable();
            $table->char('last_name')->nullable();
            $table->char('organization')->nullable();
            $table->char('email');
            $table->char('phone');
            $table->char('photo')->nullable();
            $table->integer('status_id')->nullable();
            $table->longText('order');
            $table->integer('category')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
