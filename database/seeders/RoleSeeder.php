<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'          => 'administrator',
            'display_name'  => 'administrator',
            'description'   => 'Отвечает за разработку и поддержание работоспособности системы',
        ]);
        DB::table('roles')->insert([
            'name'          => 'manager',
            'display_name'  => 'manager',
            'description'   => 'Отвечает за подписание договоров с клиентами и реализации проектов',
        ]);
        DB::table('roles')->insert([
            'name'          => 'employee',
            'display_name'  => 'employee',
            'description'   => 'Отвечает за выполнение задачи и подзадач проектов',
        ]);
    }
}
