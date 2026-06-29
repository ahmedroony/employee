<?php

namespace App\Http\Domains\Users\Actions;

use App\Models\User;

class StoreUserAction
{
    public function execute(array $data): User
    {
        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => $data['password'],
            'user_type_id' => $data['user_type_id'],
        ]);
        
        $user->shifts()->attach($data['shifts']);
        $user->save();

        return $user;
    }
}
