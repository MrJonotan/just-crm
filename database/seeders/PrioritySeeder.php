<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priorities')->insert([
            'title' => 'Низкий',
            'color' => 'info',
            'default' => true,
        ]);
        DB::table('priorities')->insert([
            'title' => 'Средний',
            'color' => 'secondary',
            'default' => true,
        ]);
        DB::table('priorities')->insert([
            'title' => 'Высокий',
            'color' => 'warning',
            'default' => true,
        ]);
        DB::table('priorities')->insert([
            'title' => 'Наивысший',
            'color' => 'danger',
            'default' => true,
        ]);
    }
}
