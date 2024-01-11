<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthCallbackController extends Controller
{
    public function __invoke()
    {
        dd('AuthCallbackController');
    }
}
