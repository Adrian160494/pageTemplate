<?php

namespace App\Http\Controllers\Auth;

use App\Http\Form\RegisterForm;
use App\Http\Controllers\Controller;
use App\Http\Objects\User;
use App\Mail\ActivateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    protected $userModel = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userModel = app()->make('Users');
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $f = new RegisterForm();
        $form = $f::prepareForm();
        if($request->getMethod() == "POST"){
            $data = $request->all();
            $this->validate($request,array(
                'name'=>'required|min:3|max:15',
                'email'=>'required|email|unique:project_users',
                'password'=>'required',
                'repeat-password'=>'required|same:password'
            ));
            $date = strtotime("+7 day", strtotime(date("Y-m-d H:i:s")));
            $data['expire_token'] = date('Y-m-d H:i:s',$date) ;
            $password = md5($data['password']);
            $data['password'] = $password;
            unset($data['repeat-password']);
            $result = $this->userModel->insert($data);
            if($result){
                $user = new User(1,$data['name'],$data['surname'],$data['_token'],$data['email'],'user');
                Mail::to($data['email'])->send(new ActivateMail($user));
                return redirect()->route('register_complete');
            } else{
                $request->getSession()->flash('errorMessage','Wystąpił błąd przy dodawaniu użytkownika!');
            }

        }

        return view('auth.register.register',array(
            'form'=>$form,
        ));
    }

    public function registerComplete(){
        return view('auth.register.complete',array(

        ));
    }

    public function activateAccount(Request $request,$email,$token){
        $data = array(
            '_token'=>null,
            'is_active' => 1,
        );
        $user = $this->userModel->getUserByEmail($email);
        if($user[0]->_token == $token){
            $result = $this->userModel->update($data,'email',$email);
            if($result){
                $request->getSession()->flash('successMessage','Konto zostało aktywowane pomyślnie!');
                return redirect()->route('main_page');
            } else{
                $request->getSession()->flash('errorMessage','Wystąpił błąd przy aktywacji konta!');
                return redirect()->route('main_page');
            }
        } else {
            $request->getSession()->flash('errorMessage','Wystąpił błąd przy aktywacji konta!');
            return redirect()->route('main_page');
        }

    }
}
