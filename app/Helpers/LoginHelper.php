<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 24.12.2018
 * Time: 00:34
 */
namespace App\Helpers;

use App\Http\Form\LoginForm;

class LoginHelper{

    protected static $form;

    public function __construct()
    {

    }

    public static function getLoginForm(){
        $f = new LoginForm();
        $form = $f::prepareForm();
        return $form;
    }
}