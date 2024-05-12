<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '2',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '1',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '3',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '2',
            'user_id' => '9',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '2', 'user_id' => '16',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '1',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '2',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '3',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '4',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '5',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '6',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '7',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '8',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '9',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '10',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '11',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '12',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '13',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '14',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '15',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '16',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '17',
            'user_type' => 'App\Models\User'
        ]);
        DB::table('role_user')->insert([
            'role_id' => '3',
            'user_id' => '18',
            'user_type' => 'App\Models\User'
        ]);
    }
}
