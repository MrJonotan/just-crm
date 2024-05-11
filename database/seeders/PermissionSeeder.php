<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([ // 1
            'name'          => 'create-employee',
            'display_name'  => 'create_employee',
            'description'   => 'Создание сотрудника',
        ]);
        DB::table('permissions')->insert([ // 2
            'name'          => 'view-employee',
            'display_name'  => 'view_employee',
            'description'   => 'Просмотр сотрудника',
        ]);
        DB::table('permissions')->insert([ // 3
            'name'          => 'update-employee',
            'display_name'  => 'update_employee',
            'description'   => 'Редактирование сотрудника',
        ]);
        DB::table('permissions')->insert([ // 4
            'name'          => 'delete-employee',
            'display_name'  => 'delete_employee',
            'description'   => 'Удаление сотрудника',
        ]);
        DB::table('permissions')->insert([ // 5
            'name'          => 'create-project',
            'display_name'  => 'create_project',
            'description'   => 'Создание проекта',
        ]);
        DB::table('permissions')->insert([ // 6
            'name'          => 'view-project',
            'display_name'  => 'view_project',
            'description'   => 'Просмотр проекта',
        ]);
        DB::table('permissions')->insert([ // 7
            'name'          => 'update-project',
            'display_name'  => 'update_project',
            'description'   => 'Редактирование проекта',
        ]);
        DB::table('permissions')->insert([ // 8
            'name'          => 'delete-project',
            'display_name'  => 'delete_project',
            'description'   => 'Удаление проекта',
        ]);
        DB::table('permissions')->insert([ // 9
            'name'          => 'create-task',
            'display_name'  => 'create_task',
            'description'   => 'Создание задачи',
        ]);
        DB::table('permissions')->insert([ // 10
            'name'          => 'view-task',
            'display_name'  => 'view_task',
            'description'   => 'Просмотр задачи',
        ]);
        DB::table('permissions')->insert([ // 11
            'name'          => 'update-task',
            'display_name'  => 'update_task',
            'description'   => 'Редактирование задачи',
        ]);
        DB::table('permissions')->insert([ // 12
            'name'          => 'delete-task',
            'display_name'  => 'delete_task',
            'description'   => 'Удаление задачи',
        ]);
        DB::table('permissions')->insert([ // 13
            'name'          => 'create-subtask',
            'display_name'  => 'create_subtask',
            'description'   => 'Создание подзадачи',
        ]);
        DB::table('permissions')->insert([ // 14
            'name'          => 'view-subtask',
            'display_name'  => 'view_subtask',
            'description'   => 'Просмотр подзадачи',
        ]);
        DB::table('permissions')->insert([ // 15
            'name'          => 'update-subtask',
            'display_name'  => 'update_subtask',
            'description'   => 'Редактирование подзадачи',
        ]);
        DB::table('permissions')->insert([ // 16
            'name'          => 'create-document',
            'display_name'  => 'create_document',
            'description'   => 'Создание документа',
        ]);
        DB::table('permissions')->insert([ // 17
            'name'          => 'view-document',
            'display_name'  => 'view_document',
            'description'   => 'Просмотр документа',
        ]);
        DB::table('permissions')->insert([ // 18
            'name'          => 'update-document',
            'display_name'  => 'update_document',
            'description'   => 'Редактирование документа',
        ]);
        DB::table('permissions')->insert([ // 19
            'name'          => 'delete-document',
            'display_name'  => 'delete_document',
            'description'   => 'Удаление документа',
        ]);
        DB::table('permissions')->insert([ // 20
            'name'          => 'view-project-statistic',
            'display_name'  => 'view_project_statistic',
            'description'   => 'Просмотр статистики проекта'
        ]);
        DB::table('permissions')->insert([ // 21
            'name'          => 'view-employee-statistic',
            'display_name'  => 'view_employee_statistic',
            'description'   => 'Просмотр статистики сотрудника',
        ]);
        DB::table('permissions')->insert([ // 22
            'name'          => 'view-employee-setting',
            'display_name'  => 'view_employee_setting',
            'description'   => 'Просмотр настроек сотрудника',
        ]);
        DB::table('permissions')->insert([ // 23
            'name'          => 'create-system-setting',
            'display_name'  => 'create_system_setting',
            'description'   => 'Создание настроек системы',
        ]);
        DB::table('permissions')->insert([ // 24
            'name'          => 'view-system-setting',
            'display_name'  => 'view_system_setting',
            'description'   => 'Просмотр настроек системы',
        ]);
        DB::table('permissions')->insert([ // 25
            'name'          => 'update-system-setting',
            'display_name'  => 'update_system_setting',
            'description'   => 'Редактирование настроек системы',
        ]);
        DB::table('permissions')->insert([ // 26
            'name'          => 'delete-system-setting',
            'display_name'  => 'delete_system_setting',
            'description'   => 'Удаление настроек системы',
        ]);
        DB::table('permissions')->insert([ // 27
            'name'          => 'create-client',
            'display_name'  => 'create_client',
            'description'   => 'Создание клиента',
        ]);
        DB::table('permissions')->insert([ // 28
            'name'          => 'view-client',
            'display_name'  => 'view_client',
            'description'   => 'Просмотр клиента',
        ]);
        DB::table('permissions')->insert([ // 29
            'name'          => 'update-client',
            'display_name'  => 'update_client',
            'description'   => 'Редактирование клиента',
        ]);
        DB::table('permissions')->insert([ // 30
            'name'          => 'delete-client',
            'display_name'  => 'delete_client',
            'description'   => 'Удаление клиента',
        ]);
    }
}
