<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectoryNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directory_names')->insert([
            'table_name' => 'departments',
            'visible_name' => 'Отделы',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'positions',
            'visible_name' => 'Должности',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'job_statuses',
            'visible_name' => 'Статусы работников',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'client_statuses',
            'visible_name' => 'Статусы клиентов',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'project_statuses',
            'visible_name' => 'Статусы проектов',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'task_statuses',
            'visible_name' => 'Статусы задач',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'priorities',
            'visible_name' => 'Приоритеты проектов / задач',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'client_categories',
            'visible_name' => 'Категории клиентов',
        ]);
        DB::table('directory_names')->insert([
            'table_name' => 'holidays',
            'visible_name' => 'Празднечные дни',
        ]);
    }
}
