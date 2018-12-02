<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 06.11.2018
 * Time: 22:39
 */

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class BaneryModel extends BaseModel {
    protected static $table = "cms_bannery_elements";
    protected static $table_join = "cms_bannery";
    protected static $table_pliki = "cms_pliki";

    public function getBanerBySlug($slug){
        $result = DB::select('SELECT *,cb.is_active as baner_activity, cbp.is_active as active_element FROM '.self::$table.' as cbp 
        LEFT JOIN '.self::$table_join.' as cb ON cbp.id_baneru = cb.id
        LEFT JOIN '.self::$table_pliki.' as p ON cbp.id_plik = p.id
        WHERE slug="'.$slug.'" AND cb.is_active = 1 AND cbp.is_active = 1');
        return $result;

    }

}