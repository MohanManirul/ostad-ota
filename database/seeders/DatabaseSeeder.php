<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            SuperAdminSeeder::class,
            ModuleSeeder::class,
            SubModuleSeeder::class,           
            // AboutSeeder::class,
            UserSeeder::class,
            // AppSettingSeeder::class
            // DaySeeder::class,
            // SslcommerzAccountSeeder::class


       ]);
    }
}
