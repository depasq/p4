<?php

namespace PeerReview\Http\Controllers\Auth;

use PeerReview\User;
use Validator;
use PeerReview\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    # Where should the user be redirected to if their login succeeds?
    //protected $redirectPath = '/profile';
    protected function authenticated($user)
    {
        $user = \PeerReview\User::find(\Auth::user()->id);
        if($user->hasRole('admin')) {
            return redirect('/dashboard');
        }
        return redirect('/profile');
    }
    # Where should the user be redirected to if their login fails?
    protected $loginPath = '/login';

    # Where should the user be redirected to after logging out?
    protected $redirectAfterLogout = '/welcome';

    # Redirect to profile page on successful registration
    protected $redirectPath = '/profile';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first' => 'required|max:255',
            'last' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'first' => $data['first'],
            'last' => $data['last'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $standard = \PeerReview\Role::find('2');
        $profile = new \PeerReview\Profile();
        $travel = new \PeerReview\Travel();
        $travel->user_id = $user->id;
        $profile->user_id = $user->id;
        $user->travel()->save($travel);
        $user->profile()->save($profile);
        $user->attachRole($standard);
        return $user;
    }

}
