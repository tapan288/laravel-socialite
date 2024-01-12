<?php

namespace App\Actions\Socials\Contracts;

use App\Models\User;

interface CreatesUser
{
    public function create($user): User;
}
