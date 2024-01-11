<?php

namespace App\Http\Controllers\Socialite;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\SocialiteService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke($service, SocialiteService $socialiteService)
    {
        $user = $socialiteService
            ->forService($service)
            ->create(Socialite::driver($service)->user());

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
