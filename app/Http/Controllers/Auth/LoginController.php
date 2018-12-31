<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LoginHelper;
use App\Http\Controllers\Controller;
use App\Http\Form\LoginForm;
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
        return redirect('/');
    }

    public function login(Request $request){
        $f = new LoginForm();
        $form = $f::prepareForm();
        if($request->getMethod() == "POST"){
            $data = $request->all();
            $user =  $this->users->getUserByEmail($data['email']);
            if($user){
                $passwordHash = md5($data['password']);
                if($passwordHash == $user[0]->password){
                    $request->getSession()->put('authUser',$user[0]);
                    $request->getSession()->flash('successMessage','Logowanie przebiegło pomyślnie!');
                    return redirect('/');
                }else{
                    $request->getSession()->flash('errorMessage','Błąd logowania!');
                    return redirect('/');
                }
            } else {
                $request->getSession()->flash('errorMessage','Użytkownik nie istnieje!');
                return redirect('/');
            }

        }
        return view('auth.login.login',array(
           'form'=>$form,
        ));
    }
}
