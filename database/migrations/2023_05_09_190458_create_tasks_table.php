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
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title'); // Название
            $table->integer('project_id'); // id проекта
            $table->integer('status_id'); // Статус
            $table->integer('priority_id'); // Приоритет
            $table->integer('stage')->nullable(); // Этап
            $table->integer('manager_id'); // Менеджер
            $table->integer('employee_id')->nullable(); // Сотрудник
            $table->dateTime('begin_start_date_plan'); // Начальная, плановая дата старта выполнения
            $table->dateTime('last_start_date_plan'); // Крайняя, плановая дата старта выполнения
            $table->dateTime('start_date_fact')->nullable(); // Фактическая дата начала выполнения
            $table->dateTime('begin_end_date_plan'); // Начальная, плановая дата окончания выполнения
            $table->dateTime('last_end_date_plan');  // Крайняя, плановая дата окончания выполнения
            $table->dateTime('end_date_fact')->nullable(); // Фактическая дата окончания выполнения
            $table->longText('description', '5000')->nullable();
            $table->float('hours'); // Количество часов на выполнение
            $table->float('readiness'); // Готовность (расчитывается из часов, выполненых подзадач)
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
        Schema::dropIfExists('tasks');
    }
};
