<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Profile;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender'    => 'required|bool'
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
        // Write a check to know the type of gender signing up to set a default pic.
        // @todo: change the default.jpg to male and female depending on the gender.
        if ($data['gender']) {
            $avatar = "public/defaults/avatars/default.jpg";
        }else{
            $avatar = "public/defaults/avatars/default.jpg";
        }
        
        // @todo: extract this.
        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'avatar'    => $avatar,
            'password'  => bcrypt($data['password']),
            'slug'      => str_slug($data['name']),
            'gender'    => $data['gender']
        ]);

        Profile::create(['user_id' => $user->id]);

        return $user;
    }
}
