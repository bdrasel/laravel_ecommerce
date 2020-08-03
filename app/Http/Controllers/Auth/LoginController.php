<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::check() && Auth::user()->role_id <= 3){
            return '/admin';
        }else{
            return '/customer';
        }
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        // $user->token;

        $user = $this->findOrCreateUser($socialUser);

        auth()->login($user);

        return redirect($this->redirectTo())->with('success', 'Login Success');
    }

    protected function findOrCreateUser($socialUser)
    {
        $user = User::firstOrNew(['email' => $socialUser->getEmail()]);

        if($user->exists) return $user;

        $user->fill([
            'name' => $socialUser->getName(),
            'password' => bcrypt('12345678'),
        ])->save();
        return $user;
    }

   
    
}
