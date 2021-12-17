<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Exception;

class SocialiteAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Google login authentication
     *
     * @return void
     */
    public function loginWithGoogle()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();

            if($user){
                Auth::login($user);
                return redirect('/home');
            }

            else{
                $createUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => hash::make('test@123'),
                    
                ]);
                
                Auth::login($createUser);
                return redirect('/home');
          }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
