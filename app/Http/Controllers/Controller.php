<?php

namespace App\Http\Controllers;

use App\Http\Model\PagesModel;
use App\Http\Objects\Contact;
use App\Mail\ContactEmail;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        return view('index',array());
    }

    public function contact(){
        return view('contact',array());
    }

    public function sendContactEmail(Request $request){
        $contact = new Contact('Adrian','sadad','dasdassa','Ciejka');
        Mail::to(env('MAIL_USERNAME'))->send(new ContactEmail($contact));
        $request->getSession()->flash('success','Udało się wysłać email');
        return redirect('/kontakt');
    }

    public function getContentFromUrl($url="/"){
        $id_projektu = config('app.id_projektu');
        if($url == "/"){
            $content = app()->make('App\Http\Model\PagesModel')->getPageByRoute($id_projektu,"/");
        } else {
            $content = app()->make('App\Http\Model\PagesModel')->getPageByRoute($id_projektu,"/".$url);
        }
        if($content){
            $template = $content[0]->url;
            $contentPage = $content[0]->content;
        } else {
            $template = 'layouts.default';
            $contentPage = '';
        }
        return view($template,array('content'=>$contentPage));
    }
}
