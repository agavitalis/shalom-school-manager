<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\user;
use Auth;
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
    //checks the type of user that logged in
     public function redirectTo()
     {

        if (Auth::user()->UserType=='Admin')
        {
            return route('admin.dashboard');
        }
        elseif(Auth::user()->UserType=='teacher')
        {
             return route('teachers.dashboard');
        }
         else
        {
             return route('students.dashboard');
        }

     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //to over ride Laraveldefault use of email,we say 
    //protected $username = 'username'; or
    protected function username()
    {
        return 'username';
    }
}
