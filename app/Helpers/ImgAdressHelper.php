<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 29.11.2018
 * Time: 22:46
 */

namespace App\Helpers;

class ImgAdressHelper{

    protected $server_picture;
    protected $picture;
    protected $photo;

    public function __construct()
    {
        $config = app()->make('App\Http\Model\KonfiguracjaModel')->getConfig();
        $this->server_picture = $config[0]->server_picture;
    }

    public function showImg($photo){
        $this->picture = $this->server_picture.'/'.$photo;
        $this->photo = $photo;
        return $this;
    }

    public function showOriginal(){
        $this->picture = $this->server_picture.'/'.$this->photo;
        return $this->picture;
    }

    public function setSize($width,$height){
        $photo = str_replace('original',$width.'x'.$height,$this->photo);
        $this->picture = $this->server_picture.'/'.$photo;
        return $this->picture;
    }


}