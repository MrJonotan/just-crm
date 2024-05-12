<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_statuses')->insert([
            'title' => 'Выполнена',
            'color' => 'success',
            'default' => true,
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'В работе',
            'color' => 'warning',
            'default' => true,
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'В ожидании',
            'color' => 'primary',
            'default' => true,
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'На приемке',
            'color' => 'info',
            'default' => true,
        ]);
        DB::table('task_statuses')->insert([
            'title' => 'Отложена',
            'color' => 'secondary',
            'default' => true,
        ]);
    }
}
