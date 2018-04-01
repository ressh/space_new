<?php

class ModalshipSell extends CWidget
{

    public $ship;

    public function init()
    {
        if( $this->ship != null )
            $this->render('modal_ship_sell', array( 'ship'=>$this->ship ));

    }
}