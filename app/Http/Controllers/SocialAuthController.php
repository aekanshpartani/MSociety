<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Socialite;
use Laravel\Socialite\Contracts\Provider;
use App\User;
use Auth;

class SocialAuthController extends Controller
{

    public function callback($provider)
    {

        $user = $this->createOrGetUser(Socialite::driver($provider));

        if($user == "NEW"){
            Session::flash('new_owner', 'First Register to Login');
            return redirect()->to('/sign-up');
        }
        auth()->login($user);

        return redirect()->to('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    private function createOrGetUser(Provider $provider)
    {

        $providerUser = $provider->user();

        $providerName = class_basename($provider);

        $user = User::whereProvider($providerName)
            ->whereProviderId($providerUser->getId())
            ->first();

        $user_exist = User::where('email', $providerUser->getEmail())->first();
        if($user_exist){

            $user_exist->email = $providerUser->getEmail();
            $user_exist->name = $providerUser->getName();
            $user_exist->provider_id = $providerUser->getId();
            $user_exist->provider = $providerName;
            $user_exist->is_active = 1;
            return $user_exist;
        }


        if (!$user){

            $user = "NEW";

            return $user;
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }
}
