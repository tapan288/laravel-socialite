<?php

namespace App\Services;

use App\Actions\Socials\CreateGithubUser;
use App\Actions\Socials\CreateTwitterUser;

class SocialiteService
{
    public function forService($service)
    {
        return match ($service) {
            'twitter' => new CreateTwitterUser(),
            'github' => new CreateGithubUser(),
            default => throw new \Exception('Invalid service provided'),
        };
    }
}
