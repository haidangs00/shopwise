<?php

namespace Database\Seeders;

use App\Models\Permission;
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
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            SizeSeeder::class,
            AdminSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RolePermissionSeeder::class,
            AdminRoleSeeder::class,

        ]);
    }
}
