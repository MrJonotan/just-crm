<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'first_name'    => 'Иванов',
            'name'          => 'Алексей',
            'last_name'     => 'Алексеевич',
            'organization'  => 'ПИК',
            'email'         => 'a.a.ivanov741@company.ru',
            'phone'         => '9098762534',
            'photo'         => 'employee1.jpg',
            'status_id'     => null,
            'order'         => 'Поддерживать и дорабатывать систему, добавлять новых сотрудников и присваивать им роли согласно разрешениям',
            'category'      => null,
        ]);
        DB::table('clients')->insert([
            'first_name'    => 'Макаров',
            'name'          => 'Максим',
            'last_name'     => 'Викторович',
            'organization'  => 'ПИК',
            'email'         => 'Makarov1988@othercompany.ru',
            'phone'         => '9023749087',
            'photo'         => 'client1.jpg',
            'status_id'     => null,
            'order'         => 'Разработать архетектурный и дизайнерский проект жилого комплекса на 2500 человек',
            'category'      => 1,
        ]);
        DB::table('clients')->insert([
            'first_name'    => 'Данкова',
            'name'          => 'Мария',
            'last_name'     => 'Юрьевна',
            'organization'  => 'Администрация Пресненского района',
            'email'         => 'admpresray@mail.ru',
            'phone'         => '9874653143',
            'photo'         => 'client2.jpg',
            'status_id'     => null,
            'order'         => 'Разработать архетектурный и дизайнерский проект жилого комплекса на 2500 человек',
            'category'      => 3,
        ]);
    }
}
