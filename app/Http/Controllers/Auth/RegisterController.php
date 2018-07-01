<?php

namespace App\Http\Controllers\Auth;
<<<<<<< HEAD

use App\User;
=======
use App\User;
use Validator;
use DB;
>>>>>>> dashboard-test
use App\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

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
<<<<<<< HEAD
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
=======
        return  Validator::make($data, [
            'username' => 'required|min:6|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
>>>>>>> dashboard-test
        ]);
		
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
<<<<<<< HEAD
     * @return \App\User
     */
    protected function create(array $data)
    {
       // $date_of_birth = $data['year'].'-'.$data['month'].'-'.$data['day'];

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
=======
     * @return User
     */
    protected function create(array $data)
    {
         $savedata = User::create([
		    'status' => 'Active',
            'first_name' => $data['username'],
            'role' => 'User',
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
>>>>>>> dashboard-test
        ]);
		$insertedId = $savedata->id;
		DB::table('role_user')->insert(['user_id' => $insertedId, 'role_id' => 2]);
     return $savedata;
	}
}
