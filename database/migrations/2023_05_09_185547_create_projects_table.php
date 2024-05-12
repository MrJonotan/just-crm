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
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title'); // Название
            $table->integer('status_id'); // Статус
            $table->integer('priority_id'); // Приоритет
            $table->integer('manager_id'); // Менеджер
            $table->integer('client_id'); // Клиент
            $table->char('color'); // Цвет
            $table->dateTime('begin_start_date_plan')->nullable(); // Начальная, плановая дата старта выполнения
            $table->dateTime('last_start_date_plan')->nullable(); // Крайняя, плановая дата старта выполнения
            $table->dateTime('start_date_fact')->nullable(); // Фактическая дата начала выполнения
            $table->dateTime('begin_end_date_plan')->nullable(); // Начальная, плановая дата окончания выполнения
            $table->dateTime('last_end_date_plan')->nullable();  // Крайняя, плановая дата окончания выполнения
            $table->dateTime('end_date_fact')->nullable(); // Фактическая дата окончания выполнения
            $table->longText('description', '5000')->nullable();
            $table->integer('budget_plan')->nullable();
            $table->integer('budget_fact')->nullable();
            $table->float('hours');
            $table->float('readiness')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
