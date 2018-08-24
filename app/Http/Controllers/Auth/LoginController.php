<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated($request , $user){
        if($user->role->name=='administrator'){
            return redirect()->route('admin.admin') ;
        }elseif($user->role->name=='manager'){
            return redirect()->route('manager.manager.index') ;
        }elseif($user->role->name=='owner'){
            return redirect()->route('owner.index') ;
        }elseif($user->role->name=='security'){
            return redirect()->route('security.index') ;
        }
    }
}
