<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_statuses')->insert([
            'title' => 'В архиве',
            'color' => 'success',
            'default' => true,
        ]);
        DB::table('project_statuses')->insert([
            'title' => 'В работе',
            'color' => 'warning',
            'default' => true,
        ]);
        DB::table('project_statuses')->insert([
            'title' => 'Отложен',
            'color' => 'secondary',
            'default' => true,
        ]);
    }
}
