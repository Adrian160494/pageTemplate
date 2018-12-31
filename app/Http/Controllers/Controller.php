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
    }

    public function index(){
        return view('index',array());
    }

    function action_exists($action) {
        try {
            action($action);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function renderContnetFromAction($match){
        $firstController = str_replace('}','',str_replace('{','',$match));
        $array_of_action = explode(':',$firstController);
        $action = $array_of_action[1]."\\".$array_of_action[2]."Controller@".$array_of_action[3];
        $exist = $this->action_exists($action);
        $contentArray = app()->call('App\Http\Controllers\\'.$action);
        return $contentArray->render();
    }

    public function pageFromCms(Request $request,$url = "/"){
        $id_projektu = config('app.id_projektu');

        if($url == "/"){
            $content = app()->make('App\Http\Model\PagesModel')->getPageByRoute($id_projektu,"/");
        } else {
            $content = app()->make('App\Http\Model\PagesModel')->getPageByRoute($id_projektu,"/".$url);
        }
        if($content){
            $reges = "#\{(.*?)\}#";
            //$reges = "/\{.*\}/";
            $matches = array();
            $contentPage = $content[0]->content;
            $result = preg_match_all($reges,$content[0]->content,$matches);
            foreach($matches[0] as $m){
                $contentFromAction = $this->renderContnetFromAction($m);
                if($contentFromAction){
                    $reges = "/\{.*\}/";
                    $matches = array();
                    $contentPage = str_replace($m,$contentFromAction,$contentPage);
                }

            }
            $template = $content[0]->url;
        } else {
            $template = null;
            $contentPage = null;
        }
        return view($template,array(
            'content'=>$contentPage,
        ));
    }
}
