<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday'=>['required', 'string'],
            'age'=>['required', 'integer'],
            'education_level'=>['required', Rule::in(['university', 'kindergarten', 'primary', 'secondary', 'pre-u'])],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        
        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->birthday = $data['birthday'];
        $user->age = $data['age'];
        $user->education_level = $data['education_level'];
        $user->password = Hash::make($data['password']);
        $user->save();
        return $user;
    }
}
