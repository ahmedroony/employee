<?php

namespace App\Http\Domains\Admin\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }
}
