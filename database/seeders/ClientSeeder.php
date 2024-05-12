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
            'first_name' => 'Макаров',
            'name' => 'Максим',
            'last_name' => 'Викторович',
            'organization' => 'ПИК',
            'email' => 'Makarov1988@othercompany.ru',
            'phone' => '9023749087',
            'photo' => 'client1.jpg',
            'status_id' => null,
            'order' => 'Разработать архетектурный и дизайнерский проект жилого комплекса на 2500 человек'
        ]);
    }
}
