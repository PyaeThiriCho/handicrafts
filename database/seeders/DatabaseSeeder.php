<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Run Spatie Seeder first to set up roles and permissions
        $this->call([
            SpatieDataSeeder::class,
        ]);

        // 2. Fetch the newly created Admin role
        $adminRole = Role::where('name', 'Admin')->first();
        
        // 3. Create your Admin account
        $admin = User::firstOrCreate(
            ['email' => 'pyaethiricho4@gmail.com'],
            [
                'name' => 'System Admin',
                'password' => Hash::make('12345678'),
            ]
        );

        // 4. Assign the role to the admin user
        if ($adminRole) {
            $admin->assignRole($adminRole);
        }

        // 5. Run the Category Seeder next
        $this->call([
            CategorySeeder::class,
        ]);

        // 6. Run the Product/Craft Seeder last
        $this->call([
            CraftSeeder::class,
        ]);
    }
}