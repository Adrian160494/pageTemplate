<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Http\Form\ContactForm;
use App\Http\Objects\Contact;
use App\Mail\ContactEmail;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function contact(Request $request){
        $f = new ContactForm();
        $form = $f::prepareForm();
        if($request->getMethod() == "POST"){
            $data = $request->all();
            $this->validate($request,array(
                'name'=>'required|min:3|max:15',
                'email'=>'required',
                'content'=>'required'
            ));
            $contact = new Contact(env('MAIL_USERNAME'),'Zapytanie z formularza kontaktowego',$data['email'],$data['content'],$data['name'],$data['surname']);
            Mail::to(env('MAIL_USERNAME'))->send(new ContactEmail($contact));
            $request->getSession()->flash('successMessage','Email został pomyślnie wysłany!');
            return redirect('/kontakt');
        }

        return view('application/contact',array(
            'form'=>$form
        ));
    }
}
