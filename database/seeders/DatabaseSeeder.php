<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder; 
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure roles exist before assigning them
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $managerRole = Role::firstOrCreate(['name' => 'Manager', 'guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'web']);

        // Create an admin user and assign role
        $adminUser = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);
        $adminUser->assignRole($adminRole);
    }
}
