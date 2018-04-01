<?php

class Modal2xMoneyToday extends CWidget
{

    public $isBonuce;

    public function init()
    {
        if( $this->isBonuce == 1 )
            $this->render('modal_2x_money_today');

    }
}

