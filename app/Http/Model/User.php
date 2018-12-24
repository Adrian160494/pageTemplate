<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 27.10.2018
 * Time: 18:56
 */
namespace App\Http\Model;

use Illuminate\Support\Facades\DB;

class User{

    private static $table = "project_users";

    public function getUserByEmail($email){
        $result = DB::select('SELECT * FROM '.self::$table.' WHERE email="'.$email.'"');
        return $result;
    }

    public function insert($data){
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

    public function update($data,$field,$id){
        if(isset($data['_token'])){
            unset($data['_token']);
        }
        $sql = "UPDATE ".self::$table." SET ";
        $data_count = count($data);
        $counter = 0;
        foreach($data as $k => $v ){
            $counter++;
            if($counter == $data_count){
                $sql = $sql." ".$k." = ".$v." ";
            } else {
                $sql = $sql." ".$k." = '".$v."', ";
            }
        }
        $sql = $sql." WHERE ".$field."='".$id."'";
        $result = DB::update($sql);
        return $result;
    }
}