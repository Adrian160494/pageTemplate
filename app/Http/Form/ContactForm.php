<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31.10.2018
 * Time: 23:00
 */

namespace App\Http\Form;

class ContactForm extends Form{
    protected $form_name = 'contact_form';
    protected static $form_elements = array();

    public static function prepareForm(){
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('text','name','Imię','','custom-form-input')
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('text','surname','Nazwisko','','custom-form-input')
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('text','email','Email','','custom-form-input'),
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createTextarea('textarea','content','Treść','','custom-form-input','','',100,5),
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('submit','submit','','','btn btn-long btn-submit','Zapisz')
        ));

        return self::$form_elements;
    }

}