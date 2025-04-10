<?php

namespace App\Actions\Socials;

use App\Models\User;

class CreateTwitterUser implements Contracts\CreatesUser
{
    public function create($user): User
    {
        return User::firstOrCreate([
            'x_id' => $user->getId(),
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
    }
}
