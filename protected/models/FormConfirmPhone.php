<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FormConfirmPhone extends CFormModel
{
    public $phone;


    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');


        return array(
            // username and password are required
            array('phone', 'required', 'message' => 'Заполните поле {attribute}.'),
            array('phone', 'numerical', 'integerOnly'=>true),
            array('phone', 'filter', 'filter'=>$obj),

        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'phone'=>'Номер телефона',
        );
    }



}
