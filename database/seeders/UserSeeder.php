<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now();

        DB::statement('DELETE FROM users');

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Md.Dummy Name',
                'email' => 'user@gmail.com',
                'phone' => '01915985336',
                'password' => Hash::make(123456),
                'otp' => '0',
                'role_id' => '1',
                'is_active' => '1',
                'is_delete' => '0',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
