<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29.12.2018
 * Time: 23:29
 */

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class CategoryModel {
    public static $table = "cms_category";

    public function getAllCategories(){
        $result = DB::select("SELECT * FROM ".self::$table." WHERE is_active=1");
        return $result;
    }
}