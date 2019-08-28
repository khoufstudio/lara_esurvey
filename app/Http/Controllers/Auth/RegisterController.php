<?php

namespace App\Http\Controllers\Auth;

use Modules\Users\Entities\User;
use Modules\LoginPublic\Entities\LoginPublic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest:public');
        $this->middleware('guest:admin');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //  protected function createAdmin(Request $request)
    //  {
    //      $this->validator($request->all())->validate();
    //      $user = User::create([
    //          'name' => $request['name'],
    //          'email' => $request['email'],
    //          'password' => Hash::make($request['password']),
    //      ]);
    //      return redirect()->intended('loginadmin');
    //  }

     public function showAdminRegisterForm()
     {
         return view('auth.register', ['url' => 'admin']);
     }
 
     public function showWriterRegisterForm()
     {
         return view('auth.register', ['url' => 'writer']);
     }

     protected function createAdmin(Request $request)
     {
         $this->validator($request->all())->validate();
         $admin = User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' => Hash::make($request['password']),
         ]);
         return redirect()->intended('login/admin');
     }

     protected function createWriter(Request $request)
     {
         $this->validator($request->all())->validate();
         $writer = LoginPublic::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' => Hash::make($request['password']),
         ]);
         return redirect()->intended('login/writer');
     }
}
