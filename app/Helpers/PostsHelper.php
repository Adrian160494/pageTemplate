<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 30.12.2018
 * Time: 14:02
 */

namespace App\Helpers;

class PostsHelper{

    protected $model;

    public function __construct()
    {
        $this->model = app()->make('App\Http\Model\PostsModel');
    }

    public function getLastPosts(){
        $result = $this->model->getLast5Posts();
        return $result;
    }
}