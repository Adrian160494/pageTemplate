<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 06.11.2018
 * Time: 21:42
 */

namespace App\Helpers;

use App\Http\Model\MenuPositionModel;
use Illuminate\Support\Facades\View;

class Helpers {

    public static function menu($slug){
        $men = resolve('App\Http\Model\MenuPositionModel');
        $menu = $men->getMenuPositionsByProject($slug);
        //$menu = MenuPositionModel::getMenuPositionsByProject($slug);
        return $menu;
    }
}