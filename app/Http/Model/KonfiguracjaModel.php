<?php

namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class KonfiguracjaModel extends BaseModel {
    public static $table = "cms_projekty_konfiguracja";

    public  function getConfig(){
        $id = config('app.id_projektu');
        $result = DB::select("SELECT * FROM ".self::$table." WHERE id_projektu=".$id);
        return $result;
    }
}