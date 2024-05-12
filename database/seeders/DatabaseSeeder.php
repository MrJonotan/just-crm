<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\JobStatus;
use App\Models\Position;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(DirectoryNameSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HolidaySeeder::class);
        $this->call(JobStatusSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectStatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RoleUser::class);
        $this->call(PermissionRoleSeeder::class);
        $this->call(TaskStatusSeeder::class);
        $this->call(PermissionUserSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
