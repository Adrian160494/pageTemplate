<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 31.10.2018
 * Time: 23:00
 */

namespace App\Http\Form;

class AddTopicForm extends Form{
    protected $form_name = 'add_topic_form';
    protected static $form_elements = array();

    public static function prepareForm(){
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('text','title','Tytuł','','custom-form-input')
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createTextarea('textarea','description','Opis','','custom-form-input','','',100,5)
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createSelect('id_category','Kategoria','custom-form-input','',''),
        ));
        array_push(self::$form_elements,array(
            'input'=>Form::createInput('submit','submit','','','btn btn-long btn-submit','Zapisz')
        ));

        return self::$form_elements;
    }

}