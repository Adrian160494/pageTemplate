<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29.12.2018
 * Time: 23:29
 */

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class PostsModel {
    public static $table = "cms_posts";

    public function getAllPosts(){
        $result = DB::select("SELECT * FROM ".self::$table." WHERE is_active=1");
        return $result;
    }

    public function getPostById($id){
        $result = DB::select("SELECT cp.*,cc.name as category FROM ".self::$table." as cp INNER JOIN cms_category as cc ON cc.id = cp.id_category   WHERE cp.is_active=1 AND cp.id=".$id);
        return $result[0];
    }

    public function getLast5Posts(){
        $result = DB::select("SELECT * FROM ".self::$table." as cp WHERE  is_active=1  ORDER BY cp.id DESC LIMIT 5 ");
        return $result;
    }
}