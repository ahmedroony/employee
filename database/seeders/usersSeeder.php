<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserType;
class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminType = UserType::firstOrCreate(['name' => 'admin']);
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password' =>bcrypt('12345678'),
            'user_type_id' => $adminType->id,
        ]);
    }
}
