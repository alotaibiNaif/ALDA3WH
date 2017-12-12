<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        	'phone' => 'required|string|max:10|unique:users',
        	'department_id' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        		
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
        	'id' => User::count(),
            'name' => $data['name'],
            'email' => $data['email'],
        	'phone' => $data['phone'],
        	'department_id' =>$data['department_id'],
            'password' => bcrypt($data['password']),
        ]);

//     	$user = new User;
//     	$user->id = User::count();
//     	$user->name = $data->input('name');
//     	$user->email = $data->input('email');
//     	$user->phone = $data->input('phone');
//     	$user->department_id = $data->input('department_id');
//     	$user->password = bcrypt($data->input('password'));
//     	$user->save();
    }
}