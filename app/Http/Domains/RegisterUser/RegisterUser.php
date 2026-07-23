<?php
namespace App\Http\Domains\RegisterUser;
use \Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterUser{

    public function storeuser(array $data){
        $registeredUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_type_id' => 1
        ]);
        return $registeredUser;
    }
}
