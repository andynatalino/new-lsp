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
    protected $redirectTo = '/';

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
     // dd('addsd');
     return Validator::make($data, [
      'username' => 'required|unique:users|string|max:20',
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6',
      'gender' => 'required|string|max:20',
      'place' => 'required|string|max:20',
      'date' => 'required|string|max:20',
      'religion' => 'required|string|max:20',
      'address' => 'required|string|max:100',
      'telp' => 'required|max:20',
    ]);

    //  $request->validate([
    //   'name' => 'required|string|max:255',
    //   'email' => 'required|string|email|max:255|unique:users',      
    // ]);

   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      // dd('asd');
      return User::create(
        [
          'username' => $data['username'],
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password']),
          'gender'   => $data['gender'],
          'place'    => $data['place'],
          'date'     => $data['date'],       
          'religion' => $data['religion'],         
          'address'  => $data['address'],
          'telp'     => $data['telp']
        ]);
    }
  }
