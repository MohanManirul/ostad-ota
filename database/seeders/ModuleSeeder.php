<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();

        DB::statement('DELETE FROM modules');

        DB::table('modules')->insert([
           
            [ 
                'id' => 1, 
                'name' => 'Air Ticket Management',
                'key' => 'air_ticket_module',
                'icon' => 'fas fa-users',
                'sequence' => 2,
                'route' => null,
                'created_at' => $date,
                'updated_at' => $date,
            ]
           
        ]);
    }
}
