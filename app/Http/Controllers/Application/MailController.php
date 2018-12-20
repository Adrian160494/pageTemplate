<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

use App\Http\Form\ContactForm;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MailController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function contact(){
        $f = new ContactForm();
        $form = $f::prepareForm();

        return view('application/contact',array(
            'form'=>$form
        ));
    }
}
