<?php

namespace App\Services;

class SocialiteService
{
    public function forService($service)
    {
        return match ($service) {
            'twitter' => 'createTwitterUser',
            'github' => 'createGithubUser',
        };
    }
}
