<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Models\User;
use Laravel\Socialite\Contracts\Factory as Socialite;

class SocialController extends Controller {


    /**
     * @var Socialite
     */
    private $socialite;

    /**
     * @var Authenticator
     */
    private $auth;

    /**
     * 
     * @param Socialite $socialite
     * @param Guard $auth
     */
    public function __construct(Socialite $socialite, Guard $auth)
    {
        
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function login($id)
    {
        return $this->socialite->driver($id)->redirect();
    }

    public function getUser($id, Request $request, Guard $auth)
    {
        $userSocial = $this->socialite->driver($id)->user();
       
        $user = User::where('twitter_id', '=', $userSocial->id)
                            ->orWhere('facebook_id', '=', $userSocial->id)
                            ->first();

        if (! $user) {
            $user = new User;
            $user->name     = $userSocial->name;
            $user->nickname = $userSocial->nickname;
            $user->email    = $userSocial->email;
            $user->avatar   = $userSocial->avatar;
            if ($id == 'twitter'){
                $user->twitter_id = $userSocial->id;
            } else {
                $user->facebook_id = $userSocial->id;
            }

            $user->save();
            $this->auth->login($user, true);
        } else {
            $this->auth->login($user, true);
        }

        return redirect('/');
    }

    public function logout()
    {
        $this->auth->logout();
        return redirect('/');
    }
}