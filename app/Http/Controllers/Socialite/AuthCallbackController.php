<?php

namespace App\Http\Controllers\Socialite;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\SocialiteService;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class AuthCallbackController extends Controller
{
    public function __invoke($service, SocialiteService $socialiteService)
    {
        $user = $socialiteService
            ->forService($service)
            ->create(Socialite::driver($service)->user());

        if ($user->wasRecentlyCreated) {
            info('user was create');
            event(new Registered($user));
        }

        auth()->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
