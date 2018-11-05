<?php

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class PagesModel extends BaseModel {
    protected static $table = "cms_projekty_strony";
    protected static $first_join = "cms_page_templates";

    public static function getPagesById($id){
        $result =DB::select("SELECT * FROM ".self::$table." WHERE id_projektu=".$id);
        return $result;
    }

    public static function getPageByRoute($id,$route){
        $result =DB::select("SELECT cps.id_projektu, cps.nazwa, cps.route, cps.content, cpt.url FROM ".self::$table." AS cps LEFT JOIN ".self::$first_join." AS cpt ON cpt.id = cps.id_page_template WHERE cps.id_projektu=".$id." AND cps.route='".$route."'");
        return $result;
    }

    public static function addMainPage($id){
        $result = DB::insert("INSERT INTO ".self::$table." (`id_projektu`,`nazwa`,`route`,`content`,`slug`) VALUES ('".$id."','Strona glowna','/',null,'main_page')");
        return $result;
    }

    public static function deletePage($id){
        $result = DB::delete("DELETE FROM ".self::$table." WHERE id=".$id);
        return $result;
    }

    public static function getContentPage($id){
        $result = DB::select("SELECT content FROM ".self::$table." WHERE id=".$id);
        return $result;
    }

    public static function insert($data){
        if(isset($data['_token'])){
            unset($data['_token']);
        }
        $sql = "INSERT INTO ".self::$table." (";
        $sql_a = ") VALUES (";
        $data_count = count($data);
        $counter = 0;
        foreach($data as $k => $v ){
            $counter++;
            if($counter == $data_count){
                $sql = $sql."`".$k."`";
                $sql_a = $sql_a."'".$v."'";
            } else {
                $sql = $sql."`".$k."`,";
                $sql_a = $sql_a."'".$v."',";
            }
        }
        $sql_a = $sql_a.")";
        $sql_r = $sql.$sql_a;
        $result = DB::insert($sql_r);
        return $result;
    }

    public static function updateContent($data){
        if(isset($data['_token'])){
            unset($data['_token']);
        }
        $sql = "UPDATE ".self::$table." SET ";
        $data_count = count($data);
        $counter = 0;
        foreach($data as $k => $v ){
            $counter++;
            if($counter == $data_count){
                $sql = $sql." ".$k." = '".$v."' ";
            } else {
                $sql = $sql." ".$k." = '".$v."', ";
            }
        }
        $sql = $sql." WHERE id_projektu=".$data['id_projektu']." AND slug='".$data['slug']."'";
        $result = DB::update($sql);
        return $result;
    }
}