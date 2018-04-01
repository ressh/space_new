<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 11.10.2015
 * Time: 2:28
 */
class FormshipBuy extends CFormModel
{
    public $summship;
    public $typeship;


    public function rules()
    {
        $obj=new CHtmlPurifier();
        $obj->options = array('HTML.Allowed'=>'');
        $obj = array( $obj ,'purify');


        return array(
            array('summship, typeship', 'required'),
            array( 'summship, typeship', 'numerical', 'integerOnly' => TRUE, 'min' => '1' ),
            array( 'summship, typeship', 'filter', 'filter'=>$obj )
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'summship'=>'Стоимость корабля',
            'typeship'=>'Тип корабля', // Торговец, воин, пират, дбытчик
        );
    }



}