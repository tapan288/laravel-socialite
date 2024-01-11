<?php

namespace App\Services;

use App\Actions\Socials\CreateTwitterUser;

class SocialiteService
{
    public function forService($service)
    {
        return match ($service) {
            'twitter' => new CreateTwitterUser(),
            'github' => 'createGithubUser',
            default => throw new \Exception('Invalid service provided'),
        };
    }
}
