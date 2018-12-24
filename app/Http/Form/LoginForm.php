<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31.10.2018
 * Time: 23:00
 */

namespace App\Http\Form;

class LoginForm extends Form{
    protected $form_name = 'login_form';
    protected static $form_elements = array();

    public static function prepareForm(){
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('text','email','Email','','')
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('password','password','Hasło','',''),
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('submit','zaloguj','','','','Zapisz')
        ));

        return self::$form_elements;
    }

}