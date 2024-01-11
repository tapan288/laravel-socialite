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
    public function __invoke($service)
    {
        $user = Socialite::driver($service)->user();

        dd(app(SocialiteService::class)->forService($service));

        auth()->login(User::firstOrCreate([
            'x_id' => $user->getId(),
        ], [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ]));

        return redirect(RouteServiceProvider::HOME);
    }
}
