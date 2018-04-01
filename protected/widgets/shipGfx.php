<?php

class shipGfx extends CWidget
{

    public $ship;

    public function init()
    {


        $this->render('shipGfx', array( 'ship'=>$this->ship ));

    }
}