<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = DB::table('roles')->where('name', 'admin')->first();

        if ($role) {
            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => $role->id,
            ]);
        } else {
            $this->command->info('Admin role does not exist, user not created.');
        }
    }
}
