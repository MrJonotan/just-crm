<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'title' => 'Директор',
            'department_id' => '1',
            'salary' => '200000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Системный администратор',
            'department_id' => '1',
            'salary' => '80000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Главный архитектор',
            'department_id' => '2',
            'salary' => '150000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Архитектор',
            'department_id' => '2',
            'salary' => '120000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Проектировщик',
            'department_id' => '2',
            'salary' => '100000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Конструктор',
            'department_id' => '2',
            'salary' => '90000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Главный дизайнер',
            'department_id' => '3',
            'salary' => '150000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Дизайнер интерьеров',
            'department_id' => '3',
            'salary' => '120000',
        ]);
        DB::table('positions')->insert([
            'title' => '3D-визуализатор',
            'department_id' => '3',
            'salary' => '100000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Декоратор',
            'department_id' => '3',
            'salary' => '90000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Менеджер по продажам и клиентским отношениям',
            'department_id' => '4',
            'salary' => '130000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Маркетолог',
            'department_id' => '4',
            'salary' => '110000',
        ]);
        DB::table('positions')->insert([
            'title' => 'Специалист по контенту и социальным сетям',
            'department_id' => '4',
            'salary' => '100000',
        ]);
    }
}
