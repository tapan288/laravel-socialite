<?php

namespace App\Actions\Socials;

use App\Models\User;

class CreateGithubUser implements Contracts\CreatesUser
{
    public function create($user): User
    {
        return User::firstOrCreate([
            'github_id' => $user->getId(),
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]);
    }
}
