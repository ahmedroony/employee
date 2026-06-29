<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminType = UserType::firstOrCreate(['name' => 'admin']);
        User::firstOrCreate([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password' =>bcrypt('12345678'),
            'user_type_id' => $adminType->id,
        ]);
        $userType = UserType::firstOrCreate(['name' => 'user']);
        User::firstOrCreate([
            'name'=>'user',
            'email'=>'user@user.com',
            'password' =>bcrypt('12345678'),
            'user_type_id' => $userType->id,
        ]);
    }
}
