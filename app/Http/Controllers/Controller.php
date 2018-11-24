<?php

namespace App\Http\Controllers;

use App\Http\Model\PagesModel;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getContentFromUrl($url="/"){
        $id_projektu = config('app.id_projektu');
        if($url == "/"){
            $content = PagesModel::getPageByRoute($id_projektu,"/");
        } else {
            $content = PagesModel::getPageByRoute($id_projektu,"/".$url);
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

    public function welcome(){
        return view('welcome',array());
    }

    public function greeting(){
        return view('greeting',array());
    }
}
