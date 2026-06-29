<?php

namespace App\Http\Domains\Users\Actions;

use App\Models\User;

class UpdateUserAction
{
    public function execute($id, array $data): bool
    {
        $user = User::findOrFail($id);
        
        $updateData = [
            'name'  => $data['name'],
            'email' => $data['email'],
        ];
        
        if (!empty($data['password'])) {
            $updateData['password'] = $data['password'];
        }
        
        return $user->update($updateData);
    }
}
