<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';
    public $users = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->users = app()->make('Users');
    }

    public function logout(Request $request){
        $request->getSession()->forget('authUser');
        $request->getSession()->flash('successMessage','Wylogowano poprawnie');
        return redirect()->route('main_page');
    }

    public function login(Request $request){
        if($request->getMethod() == "POST"){
            $data = $request->all();
            $user =  $this->users->getUserByEmail($data['email']);
            $passwordHash = md5($data['password']);
            if($passwordHash == $user[0]->password){
                $request->getSession()->put('authUser',$user);
                $request->getSession()->flash('successMessage','Logowanie przebiegło pomyślnie!');
                return redirect()->route('main_page');
            }else{
                $request->getSession()->flash('errorMessage','Błąd logowania!');
                return redirect()->route('main_page');
            }
        }
        return redirect()->route('main_page');
    }
}
