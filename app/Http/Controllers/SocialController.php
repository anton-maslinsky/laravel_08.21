<?php

namespace App\Http\Controllers;

use App\Contracts\Social;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function init(/*string $social*/): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(Social $social)
    {
        return redirect($social->saveUser(
            Socialite::driver('vkontakte')->user()
        ));
    }
}
