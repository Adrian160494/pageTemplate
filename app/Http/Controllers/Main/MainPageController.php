<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 24.12.2018
 * Time: 23:02
 */

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class MainPageController extends Controller{

    public function mainpage(){
        $cos = "Siema elo 2 5 0";
        return view('main.mainpage',array(
            'cos'=>$cos,
        ));
    }

}