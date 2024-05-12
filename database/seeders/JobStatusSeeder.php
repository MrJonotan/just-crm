<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_statuses')->insert([
            'title' => 'На работе',
            'default' => true,
        ]);
        DB::table('job_statuses')->insert([
            'title' => 'В отпуске',
            'default' => true,
        ]);
        DB::table('job_statuses')->insert([
            'title' => 'На больничном',
            'default' => true,
        ]);
        DB::table('job_statuses')->insert([
            'title' => 'На стажировке',
            'default' => true,
        ]);
    }
}
