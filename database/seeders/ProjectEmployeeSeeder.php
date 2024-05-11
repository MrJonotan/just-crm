<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '5',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '6',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '7',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '8',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '10',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '1',
            'employee_id'   => '14',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '4',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '6',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '8',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '9',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '13',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '2',
            'employee_id'   => '15',
        ]);
        DB::table('project_employees')->insert([
            'project_id'    => '3',
            'employee_id'   => '2',
        ]);
    }
}
