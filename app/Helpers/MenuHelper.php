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

class MenuHelper {
    protected $serviceProvider;

    public function __construct()
    {
        $this->serviceProvider = resolve('App\Http\Model\MenuPositionModel');
    }

    public function menu($slug){
        $menu = $this->serviceProvider->getMenuPositionsByProject($slug);
        //$menu = MenuPositionModel::getMenuPositionsByProject($slug);
        return $menu;
    }

    public function showAllPositions($slug){
        $menu = $this->serviceProvider->getMenuPositionsByProject($slug);
        foreach($menu as $m){
            echo $m->nazwa;
        }
        return 0;
    }
}