<?php

namespace App\Http\Domains\Users\Actions;

use App\Models\User;

class DeleteUserAction
{
    public function execute($id): bool
    {
        $user = User::query()->find($id);
        if (!$user) {
            return false;
        }
        
        return $user->delete();
    }
}
