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

    public function __construct()
    {
        $this->middleware('checkContent');
    }

    public function index(){
        return view('index',array());
    }
}
