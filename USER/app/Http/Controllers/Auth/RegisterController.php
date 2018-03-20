<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Mail\Welcome;
use App\Mail;
use Hash;
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
            'password' => 'required|string|min:6|confirmed',
            'address'=>'required',
            'Gender'=>'required',
            // 'contact_no'=>'required',
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
    
       // sasson()->flash('message','Thanks for signing up!');
        $message='welcome';
        $email=$data['email'];
        $subject='hello';
        // dd($data['Gender']);
    // dd($data['address']);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address'=>$data['address'],
            'Gender'=>$data['Gender'],
            // 'type'=>'User',
            // 'contact_no'=>$data['contact_no'],
        ]);
     \Mail::send('emails.welcome', $data, function($message) use ($email) {
    $message->from('sachinalok143@gmail.com');
    $message->to($email);
        });
    }
}
