<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            'first_name'            => 'Иванов',
            'name'                  => 'Алексей',
            'last_name'             => 'Алексеевич',
            'email'                 => 'a.a.ivanov741@company.ru',
            'password'              => Hash::make('director'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1974-01-14',
            'position_id'           => 1,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9098762534',
            'department_id'         => 1,
            'photo'                 => 'employee1.jpg',
            //директор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Сидоров',
            'name'                  => 'Михаил',
            'last_name'             => 'Валентинович',
            'email'                 => 'm.v.sidorov942@company.ru',
            'password'              => Hash::make('admin'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1994-04-15',
            'position_id'           => 2,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9891875323',
            'department_id'         => 1,
            'photo'                 => 'employee2.jpg',
            //системный администратор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Петров',
            'name'                  => 'Иван',
            'last_name'             => 'Сергеевич',
            'email'                 => 'i.s.petrov833@company.ru',
            'password'              => Hash::make('glarch'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1983-08-20',
            'position_id'           => 3,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9067825178',
            'department_id'         => 2,
            'photo'                 => 'employee3.jpg',
            //главный архитектор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Казаков',
            'name'                  => 'Дмитрий',
            'last_name'             => 'Александрович',
            'email'                 => 'd.a.kazakov984@company.ru',
            'password'              => Hash::make('architector1'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1998-02-12',
            'position_id'           => 4,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9013270740',
            'department_id'         => 2,
            'photo'                 => 'employee4.jpg',
            //архитектор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Паршина',
            'name'                  => 'Анна',
            'last_name'             => 'Борисовна',
            'email'                 => 'a.b.borisova865@company.ru',
            'password'              => Hash::make('architector2'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1986-08-16',
            'position_id'           => 4,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9132471268',
            'department_id'         => 2,
            'photo'                 => 'employee5.jpg',
            //архитектор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Николаева',
            'name'                  => 'Елена',
            'last_name'             => 'Павловна',
            'email'                 => 'e.p.nikolaeva896@company.ru',
            'password'              => Hash::make('projector1'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1989-04-05',
            'position_id'           => 5,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9659516845',
            'department_id'         => 2,
            'photo'                 => 'employee6.jpg',
            //проектировщик
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Волков',
            'name'                  => 'Павел',
            'last_name'             => 'Григорьевич',
            'email'                 => 'p.g.volkov967@company.ru',
            'password'              => Hash::make('projector1'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1996-05-23',
            'position_id'           => 5,
            'job_status_id'         => 2,
            'stake'                 => 1,
            'phone'                 => '9300766238',
            'department_id'         => 2,
            'photo'                 => 'employee7.jpg',
            //проектировщик
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Смирнова',
            'name'                  => 'Мария',
            'last_name'             => 'Вячеславовна',
            'email'                 => 'm.v.smirnova968@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '2001-08-09',
            'position_id'           => 6,
            'job_status_id'         => 3,
            'stake'                 => 1,
            'phone'                 => '9772823561',
            'department_id'         => 2,
            'photo'                 => 'employee8.jpg',
            //конструктор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Войнова',
            'name'                  => 'Александра',
            'last_name'             => 'Петровна',
            'email'                 => 'a.p.voynova819@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1981-07-14',
            'position_id'           => 7,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9853903973',
            'department_id'         => 3,
            'photo'                 => 'employee9.jpg',
            //Главный дизайнер
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Федоров',
            'name'                  => 'Артем',
            'last_name'             => 'Олегович',
            'email'                 => 'a.o.voynova8310@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1983-12-27',
            'position_id'           => 8,
            'job_status_id'         => 3,
            'stake'                 => 1,
            'phone'                 => '9655714180',
            'department_id'         => 3,
            'photo'                 => 'employee10.jpg',
            //Дизайнер интерьеров
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Семенова',
            'name'                  => 'Ольга',
            'last_name'             => 'Николаевна',
            'email'                 => 'o.n.semenova9011@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1990-07-03',
            'position_id'           => 8,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9651429072',
            'department_id'         => 3,
            'photo'                 => 'employee11.jpg',
            //Дизайнер интерьеров
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Титов',
            'name'                  => 'Евгений',
            'last_name'             => 'Константинович',
            'email'                 => 'e.k.titov8712@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1987-09-08',
            'position_id'           => 8,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9212648628',
            'department_id'         => 3,
            'photo'                 => 'employee12.jpg',
            //Дизайнер интерьеров
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Фадеев',
            'name'                  => 'Эдуард',
            'last_name'             => 'Максимович',
            'email'                 => 'e.m.fadeev8313@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1983-06-29',
            'position_id'           => 9,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9114786852',
            'department_id'         => 3,
            'photo'                 => 'employee13.jpg',
            //3D-визуализатор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Орлова',
            'name'                  => 'Виктория',
            'last_name'             => 'Альбертовна',
            'email'                 => 'v.a.orlova9514@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1995-09-21',
            'position_id'           => 9,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9644963377',
            'department_id'         => 3,
            'photo'                 => 'employee14.jpg',
            //3D-визуализатор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Борисова',
            'name'                  => 'Дарья',
            'last_name'             => 'Семеновна',
            'email'                 => 'd.s.borisova9015@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1990-07-08',
            'position_id'           => 10,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9784900026',
            'department_id'         => 3,
            'photo'                 => 'employee15.jpg',
            //Декоратор
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Жданов',
            'name'                  => 'Михаил',
            'last_name'             => 'Тарасович',
            'email'                 => 'm.t.zhdanov9416@company.ru',
            'password'              => Hash::make('manager'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1994-11-22',
            'position_id'           => 11,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9306283389',
            'department_id'         => 4,
            'photo'                 => 'employee16.jpg',
            //Менеджер по продажам и клиентским отношениям
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Щербакова',
            'name'                  => 'Светлана',
            'last_name'             => 'Алексеевна',
            'email'                 => 's.a.borisova9717@company.ru',
            'password'              => Hash::make(''),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1997-12-30',
            'position_id'           => 12,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9809553901',
            'department_id'         => 4,
            'photo'                 => 'employee17.jpg',
            //Маркетолог
        ]);
        DB::table('users')->insert([
            'first_name'            => 'Рогова',
            'name'                  => 'Любовь',
            'last_name'             => 'Игоревна',
            'email'                 => 'l.i.rogova9015@company.ru',
            'password'              => Hash::make('constructor'),
            'date_of_employment'    => Carbon::now(),
            'birthday'              => '1983-01-27',
            'position_id'           => 13,
            'job_status_id'         => 1,
            'stake'                 => 1,
            'phone'                 => '9206274253',
            'department_id'         => 4,
            'photo'                 => 'employee18.jpg',
            //Специалист по контенту и социальным сетям
        ]);
    }
}
