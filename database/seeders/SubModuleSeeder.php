<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();

        DB::statement('DELETE FROM sub_modules');

        DB::table('sub_modules')->insert([
            
           
            [
                'id' => 1,
                'name' => 'All City',
                'key' => 'all_city',
                'sequence' => 1,
                'route' => 'city.index',
                'module_id' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id' => 2,
                'name' => 'All Airport',
                'key' => 'all_airport',
                'sequence' => 1,
                'route' => 'airport.index',
                'module_id' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
           
            
        ]);
    }
}

